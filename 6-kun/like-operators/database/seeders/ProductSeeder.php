<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        $products = [
            [
                'name' => 'iPhone 13',
                'description' => 'Zamonaviy smartphone kamera bilan',
                'price' => 999
            ],
            [
                'name' => 'Samsung Galaxy',
                'description' => 'Android smartphone zo\'r ekran',
                'price' => 799
            ],
            [
                'name' => 'Sony Quloqchin',
                'description' => 'Wireless headphone tovush sifati a\'lo',
                'price' => 299
            ],
            [
                'name' => 'MacBook Pro',
                'description' => 'Professional laptop dasturchilar uchun',
                'price' => 1999
            ],
            [
                'name' => 'Nokia Phone',
                'description' => 'Oddiy phone uzoq batareya bilan',
                'price' => 198
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
