<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = "product";

    protected  $fillable = [
        'category_id',
        'name',
        'price',
        'sale_price',
        'brands',
        'rating',
        'image'
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }
}
