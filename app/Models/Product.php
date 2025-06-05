<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['pro_name', 'pro_price', 'pro_desc', 'categories_id', 'users_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function bills()
    {
        return $this->hasMany(Bill::class, 'products_id');
    }
}