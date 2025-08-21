<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    protected $fillable = ['name', 'address', 'phone'];

    use HasFactory;

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}
