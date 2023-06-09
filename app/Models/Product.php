<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductGallery;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name', 'users_id', 'categories_id', 'price', 'description', 'slug'
    ];

    public function getIncrementing()
    {
        return false;
    }

    public function getKeyType()
    {
        return 'string';
    }

    protected $hidden = [];
    
    protected static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->{$model->getKeyName()} = Str::uuid()->toString();
        });
    }

    public function galleries()
    {
        // 1 product punya banyak foto
        return $this->hasMany(ProductGallery::class, 'products_id', 'id');
    }

    public function user()
    {
        // 1 product hanya punya 1 user
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function category()
    {
        // 1 product hanya punya 1 category
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }
}
