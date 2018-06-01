<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $guarded = [];

    protected static function boot() {
        parent::boot();

        static::created(function($item) {
            $book = Book::find($item->book_id);
            $book->in_stock -= $item->quantity;
            $book->save();
        });
    }

    public function book()
    {
        return $this->belongsTo(Book::class)->select('id', 'title', 'isbn');
    }
}
