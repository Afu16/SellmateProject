<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Omzet extends Model
{
        use HasFactory;

    protected $fillable = [
        'user_id',
        'product_id',
        'quantity',
        'total_omzets',
        'date',
    ];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }
        // Relasi ke Product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
        // User.php
    public function omzets()
    {
        return $this->hasMany(Omzet::class);
    }

}
