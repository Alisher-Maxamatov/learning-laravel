<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Oziq-ovqat', 'slug' => 'oziq-ovqat'],
            ['name' => 'Kiyim-kechak', 'slug' => 'kiyim-kechak'],
            ['name' => 'Xo\'jalik buyumlari', 'slug' => 'xojalik-buyumlari'],
            ['name' => 'Elektronika', 'slug' => 'elektronika'],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
