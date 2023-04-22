<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id', 'users_id'
    ];

    protected $hidden = [];

    public function product()
    {
        // setiap item cart pasti punya 1 product => productnya apa
        return $this->hasOne(Product::class, 'id', 'products_id');
    }

    public function user()
    {
        // menentukan usernya siapa
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
