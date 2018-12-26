<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['title', 'description', 'image', 'slug', 'category_id'];

    /**
     * @var string
     */
    protected $table = 'blogs';

    /**
     * Handel the relation between blog and categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
