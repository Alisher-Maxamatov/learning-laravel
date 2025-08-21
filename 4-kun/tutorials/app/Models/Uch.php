<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Uch extends Model
{
    protected $fillable = ['birinchi','ikkinchi','uchinchi'];

    public function user( )
    {
        return $this->belongsTo(User::class);
    }
}
