<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // 🔥 One Brand has many Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
