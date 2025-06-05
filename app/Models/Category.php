<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = ['cat_name'];

    // Relation : une catégorie a plusieurs produits
    public function products()
    {
        return $this->hasMany(Product::class, 'categories_id');
    }
}
