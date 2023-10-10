<?php

    namespace App\Models\Pages;

    use App\Models\Admin;
    use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
    use Astrotomic\Translatable\Translatable;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;

    class Page extends Model implements TranslatableContract
    {
        use Translatable;

        const TYPE_PAGE          = 1;
        const TYPE_STORY         = 2;
        const TYPE_BOOK          = 3;
        const TYPE_BLOG          = 4;
        const TYPE_FORUM         = 5;
        const TYPE_WEB_FORM      = 6;
        const TYPE_PARTNER_LINKS = 7;
        const TYPE_POLL          = 8;
        const TYPE_IMAGE         = 9;

        public $translatedAttributes
            = [
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

        protected $fillable
            = [
                'alias',
                'type',
                'admin_id',
                'active',
                'nid',
                'slider',
                'recommend',
                'created_at',
                'updated_at',
            ];

        public function scopeWithoutTimestamps()
        {
            $this->timestamps = false;
            return $this;
        }

        /**
         * Relation with admin
         */
        public function admin()
        {
            return $this->belongsTo(Admin::class);
        }

        /**
         * Relation with files
         */
        public function files()
        {
            return $this->hasMany(PageFile::class)->orderBy('order')->with('file');
        }

        /**
         * Relation with file
         */
        public function file()
        {
            return $this->hasOne(PageFile::class)->orderBy('order')->with('file');
        }

        /**
         * Relation with title image
         */
        public function titleImage()
        {
            return $this->hasOne(PageFile::class)->where('title_image', true)->with('file');
        }

        /**
         * Relation with slider image
         */
        public function sliderImage()
        {
            return $this->hasOne(PageFile::class)->where('slider_image', true)->with('file');
        }

        /**
         * Scope a query to only include active users.
         *
         * @param Builder $query
         *
         * @return Builder
         */
        public function scopeActive(Builder $query)
        {
            return $query->where('active', true);
        }


    }
