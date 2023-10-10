<?php

    namespace App\Models;

    use App\Models\Pages\PageFile;
    use Illuminate\Database\Eloquent\Model;

    class File extends Model
    {
        const TYPE_IMAGE = 0;

        protected $fillable
            = [
                'type',
                'filename',
                'uri',
                'mimetype',
                'filesize',
                'active',
                'fid',
                'created_at',
                'updated_at',
            ];

        /**
         * Relation with page
         */
        public function page_file()
        {
            return $this->belongsTo(PageFile::class);
        }

        public function scopeWithoutTimestamps()
        {
            $this->timestamps = false;
            return $this;
        }

        /**
         * scope, get only active page
         * @return mixed
         */
        public function scopeActive()
        {
            return $this->whereActive(true);
        }

    }
