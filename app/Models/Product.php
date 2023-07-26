<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'price',
        'images',
        'discount',
        'details',
        'category_id',
        'brand',
        'category',
        'gender',
        'delivery_time',
        'product_group',
        'free_cargo',
    ];

    protected $casts = ['images' => 'array'];

    public function colors()
    {
        return $this->belongsToMany(\App\Models\Color::class, 'product_colors')->withPivot('images', 'slug', 'count', 'details');
    }

    public function cat()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
