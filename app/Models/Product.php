<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'price',
        'product_photo',
        'category',
    ];
        public function omzets()
    {
        return $this->hasMany(Omzet::class, 'product_id');
    }
}

