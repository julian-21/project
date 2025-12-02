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
                'name' => 'Produk A',
                'sku' => 'LAPTOP-001',
                'description' => 'High-performance ultrabook with Intel i7 processor',
                'price' => 18500000,
                'stock' => 25
            ],
            [
                'name' => 'Produk B',
                'sku' => 'TELEVISION-001',
                'description' => 'Television with 4K UHD resolution',
                'price' => 19999000,
                'stock' => 50
            ],
            [
                'name' => 'Produk C',
                'sku' => 'FURNITURE-001',
                'description' => 'Kichten set with modern design',
                'price' => 14999000,
                'stock' => 40
            ],
            [
                'name' => 'Produk D',
                'sku' => 'CAR-001',
                'description' => 'BYD Atto 3 electric car',
                'price' => 299990000,
                'stock' => 15
            ],
            [
                'name' => 'Product E',
                'sku' => 'SHOES-001',
                'description' => 'Shoes with comfortable fit',
                'price' => 900000,
                'stock' => 30
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}