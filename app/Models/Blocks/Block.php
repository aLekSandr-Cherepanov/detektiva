<?php

    namespace App\Models\Blocks;

    use App\Models\Admin;
    use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
    use Astrotomic\Translatable\Translatable;
    use Illuminate\Database\Eloquent\Builder;
    use Illuminate\Database\Eloquent\Model;

    class Block extends Model implements TranslatableContract
    {
        use Translatable;

        const TYPE_BLOCK_FAQ = 1;

        public $translatedAttributes
            = [
                'title',
                'content',
            ];

        protected $fillable
            = [
                'name',
                'type',
                'order',
                'active',
                'admin_id',
            ];

        /**
         * Relation with admin
         */
        public function admin()
        {
            return $this->belongsTo(Admin::class);
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
