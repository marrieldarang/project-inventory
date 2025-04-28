<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Allow mass assignment (optional for now)
    protected $fillable = [
        'name',
        'model',
        'description',
        'category_id',
        'brand_id',
    ];

    // 🔥 Define relationship to Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // 🔥 Define relationship to Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
}
