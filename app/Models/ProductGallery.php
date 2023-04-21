<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends Model
{
    use HasFactory;

    protected $fillable = [
        'photos', 'products_id'
    ];

    protected $hidden = [];

    public function product()
    {
        // 1 product punya banyak foto
        return $this->belongsTo(Product::class, 'products_id', 'id');
    }
}
