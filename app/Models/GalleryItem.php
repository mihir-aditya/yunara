<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'title',
        'description',
        'media_type',
        'media_url',
        'aspect_ratio',
        'sort_order',
    ];
}
