<?php

    namespace App\Models\Blocks;

    use Illuminate\Database\Eloquent\Model;

    class BlockTranslation extends Model
    {
        const CREATED_AT = null;
        const UPDATED_AT = null;

        protected $fillable = [
            'title',
            'content',
        ];
    }
