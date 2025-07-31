<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    // 1-vazifa: Description bo'yicha qidiruv
    public static function searchByDescription($search)
    {
        if (strtolower($search) == 'phone') {
            // Phone uchun maxsus qoida
            return self::where('description', 'LIKE', '%phone%')
                ->orWhere('description', 'LIKE', '%smartphone%')
                ->orWhere('description', 'LIKE', '%headphone%')
                ->get();
        } else {
            // qidiruv
            return self::where('description', 'LIKE', '%' . $search . '%')->get();
        }
    }

    // 2-vazifa:
    public static function searchCombined($search)
    {
        return self::where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('description', 'LIKE', '%' . $search . '%')
            ->get();
    }
}
