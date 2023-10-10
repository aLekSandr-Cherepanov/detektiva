<?php

    namespace App\Models\Pages;

    use Illuminate\Database\Eloquent\Model;

    class PageTranslation extends Model
    {
        public $timestamps = false;

        protected $fillable = [
            'title',
            'summary',
            'content',
            'seo_title',
            'seo_keywords',
            'seo_description',
            'seo_canonical',
            'seo_robots',
            'seo_content',
        ];
    }
