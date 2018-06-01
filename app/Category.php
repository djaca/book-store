<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function($category) {
            $category->books()->delete();
        });
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function books()
    {
        return $this->hasMany(Book::class);
    }
}
