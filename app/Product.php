<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'user_id',
        'name',
        'description',
        'image',
        'quantity',
        'price',
        'reorder_point',
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function stock(){
        return $this->belongsTo(Stock::class);
    }
}
