<?php

    namespace App\Console\Commands;

    use App\Models\Admin;
    use App\Models\File;
    use App\Models\Pages\Page;
    use App\Models\Pages\PageFile;
    use Carbon\Carbon;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Log;

    class ImportFromDrupalCommand extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'import:drupal';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Import DB from Drupal';

        /**
         * Create a new command instance.
         *
         * @return void
         */
        public function __construct()
        {
            parent::__construct();
        }

        /**
         * Execute the console command.
         */
        public function handle()
        {
            Log::info('Run import');

            $total = DB::connection('drupal')
                ->table('node')
                ->where('language', 'ru')
                ->count();

            Log::info('Count nodes: ' . $total);

            DB::connection('drupal')
                ->table('node')
                ->where('language', 'ru')
                ->orderBy('nid')
                ->chunk(100, function ($nodes) {

                    foreach ($nodes as $node) {

                        $node_de = DB::connection('drupal')
                            ->table('node')
                            ->where('language', 'de')
                            ->where('nid', '!=', $node->nid)
                            ->where('tnid', $node->nid)
                            ->first();

                        $content_de = null;

                        $alias = DB::connection('drupal')
                            ->table('url_alias')
                            ->where('language', 'ru')
                            ->where('src', 'node/' . $node->nid)
                            ->first();

                        switch ($node->type) {
                            case 'page':
                                $data['type'] = Page::TYPE_PAGE;
                                break;
                            case 'story':
                                $data['type'] = Page::TYPE_STORY;
                                break;
                            case 'book':
                                $data['type'] = Page::TYPE_BOOK;
                                break;
                            case 'blog':
                                $data['type'] = Page::TYPE_BLOG;
                                break;
                            case 'forum':
                                $data['type'] = Page::TYPE_FORUM;
                                break;
                            case 'webform':
                                $data['type'] = Page::TYPE_WEB_FORM;
                                break;
                            case 'partner_links':
                                $data['type'] = Page::TYPE_PARTNER_LINKS;
                                break;
                            case 'poll':
                                $data['type'] = Page::TYPE_POLL;
                                break;
                            case 'image':
                                $data['type'] = Page::TYPE_IMAGE;
                                break;
                        }

                        $content = DB::connection('drupal')
                            ->table('node_revisions')
                            ->where('nid', $node->nid)
                            ->first();
                        if (isset($node_de)) {
                            $content_de = DB::connection('drupal')
                                ->table('node_revisions')
                                ->where('nid', $node_de->nid)
                                ->first();
                        }

                        $data['ru'] = [
                            'title'   => $node->title,
                            'summary' => isset($content) ? $content->teaser : '',
                            'content' => isset($content) ? $content->body : '',
                        ];
                        if (isset($content_de)) {
                            $data['de'] = [
                                'title'   => $node_de->title,
                                'summary' => $content_de->teaser,
                                'content' => $content_de->body,
                            ];
                        }

                        $data['nid']      = $node->nid;
                        $data['admin_id'] = 'ba990b17-7c47-4d79-bacd-6c518ea0051e';
                        $data['active']   = $node->status;
                        $data['alias']    = isset($alias) ? $alias->dst : 'node/' . $node->nid;

                        if (!Page::where('alias', $data['alias'])->first()) {
                            $page = Page::create($data);
                            $page->withoutTimestamps()->update([
                                'created_at' => Carbon::parse($node->created)->toDateTimeString(),
                                'updated_at' => Carbon::parse($node->changed)->toDateTimeString(),
                            ]);

                            //--------- page_to_files ----------
//                            $photos = DB::connection('drupal')
//                                ->table('field_data_field_foto_1')
//                                ->where('entity_id', $node->nid)
//                                ->get();

//                            foreach ($photos as $photo) {
//                                $file = DB::connection('drupal')
//                                    ->table('file_managed')
//                                    ->where('fid', $photo->field_foto_1_fid)
//                                    ->first();
//
//                                $data_file['type']     = File::TYPE_IMAGE;
//                                $data_file['filename'] = $file->filename;
//                                $data_file['uri']      = str_replace('public://', '', $file->uri);
//                                $data_file['mimetype'] = $file->filemime;
//                                $data_file['filesize'] = $file->filesize;
//                                $data_file['active']   = true;
//                                $data_file['fid']      = $file->fid;
//
//                                if (!File::where('fid', $data_file['fid'])->first()) {
//                                    $file_new = File::create($data_file);
//                                    $file_new->withoutTimestamps()->update([
//                                        'created_at' => Carbon::parse($file->timestamp)->toDateTimeString(),
//                                        'updated_at' => Carbon::parse($file->timestamp)->toDateTimeString(),
//                                    ]);
//                                    if ($file_new) {
//                                        $data_photo['page_id'] = $page->id;
//                                        $data_photo['file_id'] = $file_new->id;
//                                        $data_photo['order']   = $photo->delta;
//                                        $data_photo['alt']     = $photo->field_foto_1_alt;
//                                        $data_photo['title']   = $photo->field_foto_1_title;
//                                        $data_photo['width']   = $photo->field_foto_1_width;
//                                        $data_photo['height']  = $photo->field_foto_1_height;
//
//                                        $page_file = PageFile::create($data_photo);
//                                    }
//                                }
//                            }
                        }
                    }
                });
        }


    }
