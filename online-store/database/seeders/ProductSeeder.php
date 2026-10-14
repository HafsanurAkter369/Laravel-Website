<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Wireless Headphones',
                'category' => 'Electronics',
                'description' => 'High-quality wireless headphones for everyday use.',
                'price' => 1250,
                'stock' => 10,
                'image' => 'headphones.avif',
            ],
            [
                'name' => 'Smart Watch',
                'category' => 'Electronics',
                'description' => 'Track your steps, heart rate and notifications on your wrist.',
                'price' => 3200,
                'stock' => 15,
                'image' => 'smartwatch.avif',
            ],
            [
                'name' => 'Cotton T-Shirt',
                'category' => 'Fashion',
                'description' => 'Soft and comfortable cotton t-shirt for daily wear.',
                'price' => 550,
                'stock' => 40,
                'image' => 'tshirt.avif',
            ],
            [
                'name' => 'Backpack',
                'category' => 'Accessories',
                'description' => 'Strong and spacious backpack for school, office and travel.',
                'price' => 1450,
                'stock' => 20,
                'image' => 'backpack.avif',
            ],
            [
                'name' => 'Ceramic Coffee Mug',
                'category' => 'Home',
                'description' => 'A sturdy ceramic mug for your morning tea or coffee.',
                'price' => 320,
                'stock' => 30,
                'image' => 'mug.avif',
            ],
        ];

        foreach ($products as $product) {
            Product::updateOrCreate(
                ['name' => $product['name']],
                $product
            );
        }
    }
}