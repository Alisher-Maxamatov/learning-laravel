<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        'original_path', 'thumb_path', 'medium_path', 'large_path', 'status'
    ];
}
