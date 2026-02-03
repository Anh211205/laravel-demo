<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'news_id',
        'quantity',
        'price'
    ];

    public function news()
    {
        return $this->belongsTo(News::class, 'news_id');
    }
    
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
