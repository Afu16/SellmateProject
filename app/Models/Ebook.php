<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'thumbnail',
        'kategori',
        'file_url',
    ];
}
