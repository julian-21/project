<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    public function run(): void
    {
        $products = Product::all();
        $startDate = Carbon::now()->subMonths(6);
        $endDate = Carbon::now();
        
        $customerNames = [
            'Budi Santoso', 'Siti Nurhaliza', 'Ahmad Wijaya', 
            'Dewi Lestari', 'Rudi Hermawan', 'Maya Kusuma',
            'Andi Pratama', 'Linda Wijaya', 'Hendra Gunawan',
            'Fitri Handayani', 'Agus Setiawan', 'Ratna Sari'
        ];

        $invoiceCounter = 1;

        for ($i = 0; $i < 200; $i++) {
            $product = $products->random();
            $quantity = rand(1, 5);
            $saleDate = Carbon::createFromTimestamp(
                rand($startDate->timestamp, $endDate->timestamp)
            );
            
            $unitPrice = rand(0, 100) > 20 
                ? $product->price 
                : $product->price * 0.9; 
            
            $totalPrice = $quantity * $unitPrice;

            Sale::create([
                'product_id' => $product->id,
                'sale_date' => $saleDate->format('Y-m-d'),
                'quantity' => $quantity,
                'unit_price' => $unitPrice,
                'total_price' => $totalPrice,
                'customer_name' => $customerNames[array_rand($customerNames)],
                'invoice_number' => 'INV-' . str_pad($invoiceCounter++, 6, '0', STR_PAD_LEFT)
            ]);
        }
    }
}