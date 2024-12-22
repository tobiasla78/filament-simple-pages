<?php

namespace Tobiasla78\FilamentSimplePages\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SimplePage extends Model
{
    use HasFactory;

    protected $table = 'filament_simple_pages';

    protected $fillable = [
        'slug',
        'title',
        'content',
        'is_public',
        'indexable',
        'image_url',
        'register_outside_filament',
        'layout',
        'extends',
        'section'
    ];
}
