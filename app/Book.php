<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;

class Book extends Model
{
    protected $guarded = [];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'isbn';
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->select('id', 'name', 'slug');
    }

    public function scopeForCategory($builder, $category)
    {
        return $category ? $builder->where('category_id', $category->id) : $builder;
    }

    /**
     * Add book
     *
     * @param $data
     *
     * @return \App\Book
     */
    public function addBook($data)
    {
        return Book::create([
            'title' => $data['title'],
            'author' => $data['author'],
            'description' => $data['description'],
            'category_id' => $this->getCategoryId($data['category']),
            'isbn' => $data['isbn'],
            'price' => $data['price'],
            'in_stock' => $data['in_stock'],
            'img' => $this->uploadImage($data['img']),
        ]);
    }

    /**
     * Update book
     *
     * @param $data
     *
     * @return $this
     */
    public function updateBook($data)
    {
        $this->update([
            'title' => $data['title'],
            'author' => $data['author'],
            'description' => $data['description'],
            'category_id' => $this->getCategoryId($data['category']),
            'isbn' => $data['isbn'],
            'price' => $data['price'],
            'in_stock' => $data['in_stock'],
        ]);

        if (array_key_exists('img', $data)) {
            $oldImage = public_path('books') . $this->img;

            if (File::exists($oldImage)) {
                File::delete($oldImage);
            }

            $this->img = $this->uploadImage($data['img']);
            $this->save();
        }

        return $this;
    }

    /**
     * Upload image
     *
     * @param $image
     *
     * @return string
     */
    protected function uploadImage($image)
    {
        $name = '/' . str_random(8) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('books'), $name);

        return $name;
    }

    /**
     * @param $category
     * @return mixed
     */
    protected function getCategoryId($category)
    {
        return Category::where('slug', $category)->first()->id;
    }
}
