<?php

    namespace App\Models\Pages;

    use App\Models\File;
    use Illuminate\Database\Eloquent\Model;

    class PageFile extends Model
    {

        protected $fillable
            = [
                'page_id',
                'file_id',
                'order',
                'title_image',
                'alt',
                'title',
                'width',
                'height',
            ];

        /**
         * Relation with page
         */
        public function page()
        {
            return $this->belongsTo(Page::class);
        }

        /**
         * Relation with file
         */
        public function file()
        {
            return $this->belongsTo(File::class);
        }
    }
