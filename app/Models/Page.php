<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    use HasFactory;

    protected $fillable = [
        'slug',
        'title',
        'subtitle',
        'content',
        'icon',
        'file_path',
    ];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class, 'slug', 'slug');
    }
}