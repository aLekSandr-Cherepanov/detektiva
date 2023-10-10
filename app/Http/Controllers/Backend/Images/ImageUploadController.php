<?php

    namespace App\Http\Controllers\Backend\Images;

    use App\Filters\ResizeFilter;
    use App\Http\Controllers\Controller;
    use App\Models\File;
    use App\Models\Pages\Page;
    use App\Models\Pages\PageFile;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\Request;
    use Illuminate\Support\Carbon;
    use Illuminate\Support\Facades\Storage;
    use Illuminate\Support\Str;
    use Illuminate\View\View;
    use Intervention\Image\Facades\Image;

    class ImageUploadController extends Controller
    {
        private $ext = ['jpg', 'jpeg', 'png', 'gif'];

        /**
         * File store
         *
         * @param Request $request
         *
         * @return mixed
         */
        public function store(Request $request)
        {
            if ($request->hasFile('files')) {
                $files        = $request->file('files');
                $delta        = 0;
                $output_files = [];
                $page         = PageFile::where('page_id', $request->page_id)->orderBy('order')->first();
                if ($page) {
                    $delta = $page->order;
                }

                foreach ($files as $file) {
                    $extension  = strtolower($file->getClientOriginalExtension());
                    $path_parts = pathinfo($file->getClientOriginalName());
                    if (in_array($extension, $this->ext)) {
                        $filename = Str::slug($path_parts['filename'], '_');
                        $picture  = $filename . '.' . $extension;
                        $folder   = 'articles/' . Carbon::now()->toDateString();

                        if (!Storage::disk('public')->exists('files/' . $folder)) {
                            Storage::disk('public')->makeDirectory('files/' . $folder);
                        }
                        $destinationPath = $folder . '/' . $request->page_id;
                        if (!Storage::disk('public')->exists('files/' . $destinationPath)) {
                            Storage::disk('public')->makeDirectory('files/' . $destinationPath);
                        }

                        Storage::disk('public')->makeDirectory('files/' . $destinationPath);
                        $destinationUri = $destinationPath . '/' . $picture;

                        $image = Image::make($file);
                        $image->resize(730, 730, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                        Storage::disk('public')->put('files/' . $destinationUri, (string)$image->encode());

                        $file_new           = new File();
                        $file_new->type     = File::TYPE_IMAGE;
                        $file_new->filename = $picture;
                        $file_new->uri      = $destinationUri;
                        $file_new->mimetype = $image->mime();
                        $file_new->filesize = $image->filesize();
                        $file_new->active   = 1;
                        $file_new->fid      = 0;
                        $file_new->save();

                        $data_photo['page_id'] = $request->page_id;
                        $data_photo['file_id'] = $file_new->id;
                        $data_photo['order']   = $delta++;
                        $data_photo['alt']     = '';
                        $data_photo['title']   = '';
                        $data_photo['width']   = $image->width();
                        $data_photo['height']  = $image->height();

                        $page_file = PageFile::create($data_photo);

                        $output_file['id']           = $page_file->id;
                        $output_file['name']         = $file_new->filename;
                        $output_file['size']         = $file_new->filesize;
                        $output_file['type']         = $file_new->mimetype;
                        $output_file['url']          = Storage::disk('local')->url('public/files/' . $file_new->uri);
                        $output_file['deleteUrl']    = route('backend.image.delete', ['id' => $page_file->id]);
                        $output_file['thumbnailUrl'] = route('backend.image.thumbnail', ['id' => $file_new->id]);
                        $output_file['deleteType']   = 'GET';
                        $output_file['checked']      = '';
                        $output_file['slider']       = '';

                        $output_files[] = $output_file;
                    }
                }
                return response()->json(['files' => $output_files], 200);
            } else {
                if ($request->has('id')) {
                    $output_files = [];
                    $page         = Page::with(['files'])->where('id', $request->id)->first();

                    foreach ($page->files as $file) {
                        $output_file['id']           = $file->id;
                        $output_file['name']         = $file->file->filename;
                        $output_file['size']         = $file->file->filesize;
                        $output_file['type']         = $file->file->mimetype;
                        $output_file['url']          = Storage::disk('local')->url('public/files/' . $file->file->uri);
                        $output_file['thumbnailUrl'] = route('backend.image.thumbnail', ['id' => $file->file->id]);
                        $output_file['deleteUrl']    = route('backend.image.delete', ['id' => $file->id]);
                        $output_file['deleteType']   = 'GET';
                        $output_file['checked']      = $file->title_image ? 'checked' : '';
                        $output_file['slider']       = $file->slider_image ? 'checked' : '';

                        $output_files[] = $output_file;
                    }
                    return response()->json(['files' => $output_files], 200);
                }
            }
        }

        /**
         * Get image thumbnail
         *
         * @param $id
         *
         * @return mixed
         */
        public function thumbnail($id)
        {
            $file = File::where('id', $id)->first();
            $w    = $h = 90;
            if (Storage::disk('local')->exists('public/files/' . $file->uri)) {
                if (config('cache.enabled', true)) {
                    $img = Image::cache(function ($image) use ($file, $w, $h) {
                        return $image->make('storage/files/' . $file->uri)->filter(new ResizeFilter($w, $h));
                    }, config('cache.cache_time'), true);
                } else {
                    $img = Image::make('storage/files/' . $file->uri)->filter(new ResizeFilter($w, $h));
                }
            } else {
                $img = Image::make('storage/files/bgr-90x90.jpg');
            }
            return $img->response();
        }

        /**
         * File destroy
         *
         * @param $id
         *
         * @return mixed
         */
        public function delete($id)
        {
            $page_file = PageFile::with('file')->where('id', $id)->first();
            Storage::disk('local')->delete('public/files/' . $page_file->file->uri);
            $page_file->file()->delete();
            return true;
        }

        /**
         * Set Image Title
         *
         * @param Request $request
         *
         * @return mixed
         */
        public function setTitle(Request $request)
        {
            if (isset($request->id) && isset($request->checked)) {
                $page_file = PageFile::with('file')->where('id', $request->id)->first();
                if ($page_file) {
                    PageFile::where('page_id', $page_file->page_id)->update(['title_image' => false]);
                    if ($request->checked == 1) {
                        $page_file->title_image = true;
                    } else {
                        $page_file->title_image = false;
                    }
                    $page_file->save();
                    return 'success';
                }
            }
            return true;
        }

        /**
         * Set Image Title
         *
         * @param Request $request
         *
         * @return mixed
         */
        public function setSlider(Request $request)
        {
            if (isset($request->id) && isset($request->checked)) {
                $page_file = PageFile::with('file')->where('id', $request->id)->first();
                if ($page_file) {
                    PageFile::where('page_id', $page_file->page_id)->update(['slider_image' => false]);
                    if ($request->checked == 1) {
                        $page_file->slider_image = true;
                    } else {
                        $page_file->slider_image = false;
                    }
                    $page_file->save();
                    return 'success';
                }
            }
            return true;
        }

        /*
     * jQuery File Upload Plugin PHP Class
     * https://github.com/blueimp/jQuery-File-Upload
     *
     * Copyright 2010, Sebastian Tschan
     * https://blueimp.net
     *
     * Licensed under the MIT license:
     * http://www.opensource.org/licenses/MIT
     */

        protected function get_file_size($file_path, $clear_stat_cache = false)
        {
            if ($clear_stat_cache) {
                if (version_compare(PHP_VERSION, '5.3.0') >= 0) {
                    clearstatcache(true, $file_path);
                } else {
                    clearstatcache();
                }
            }
            return $this->fix_integer_overflow(filesize($file_path));
        }

        protected function fix_integer_overflow($size)
        {
            if ($size < 0) {
                $size += 2.0 * (PHP_INT_MAX + 1);
            }
            return $size;
        }
    }
