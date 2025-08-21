<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    use HasFactory;

    protected $fillable = [
        'original_name',
        'file_path',
        'file_type',
        'file_size',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
