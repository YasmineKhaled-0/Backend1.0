<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'date',
        'client_id',
        'user_id',
        'total_amount',
        'payment_methods_id'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'details',
            'order_id',
            'product_id')
            ->withPivot(['price', 'quantity', 'total', 'created_at'])
            ->withTimestamps();
    }
    
    public function payment()
    {
        return $this->belongsTo(paymentMethod::class, 'payment_methods_id');
    }
}
