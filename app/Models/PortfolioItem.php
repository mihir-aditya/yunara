<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title',
        'category',
        'location',
        'image_url',
        'sort_order',
    ];
}
