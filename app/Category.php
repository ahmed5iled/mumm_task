<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'slug', 'parent_id', 'category_id'];


    /**
     * @var string
     */
    protected $table = 'categories';

    /**
     * Handel the relation between categories and blogs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
}
