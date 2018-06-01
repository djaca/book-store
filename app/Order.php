<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function items()
    {
        return $this->hasMany(OrderItem::class)->select('id', 'order_id', 'book_id', 'quantity', 'price');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
