<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::insert([
            [
                'name' => 'Kemeja FF',
                'brand' => 'Zara',
                'category' => 'baju',
                'price' => 150000,
                'image_url' => 'kemeja-flanel.jpg',
                'description' => 'Kemeja flanel pria, nyaman dan stylish.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Celana Jeans',
                'brand' => 'Levis',
                'category' => 'celana',
                'price' => 200000,
                'image_url' => 'celana-jeans.jpg',
                'description' => 'Celana jeans biru klasik.',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jaket Hoodie',
                'brand' => 'H&M',
                'category' => 'baju',
                'price' => 250000,
                'image_url' => 'hoodie.jpg',
                'description' => 'Jaket hoodie hangat dan nyaman.',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
