<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Admin
        User::firstOrCreate(
            ['email' => 'admin@umkm.com'],
            [
                'name' => 'Admin UMKM',
                'password' => Hash::make('password'),
                'role' => 'admin'
            ]
        );

        // Seller
        User::firstOrCreate(
            ['email' => 'seller@umkm.com'],
            [
                'name' => 'Seller Tulungagung',
                'password' => Hash::make('password'),
                'role' => 'seller'
            ]
        );

        // Customer
        User::firstOrCreate(
            ['email' => 'customer@umkm.com'],
            [
                'name' => 'Customer',
                'password' => Hash::make('password'),
                'role' => 'customer'
            ]
        );

        // Categories (hanya jika belum ada)
        $categories = ['Makanan', 'Minuman', 'Kerajinan', 'Pakaian', 'Elektronik'];
        foreach ($categories as $cat) {
            Category::firstOrCreate(['name' => $cat]);
        }

        // Jangan membuat produk baru jika sudah ada, atau jika ingin silakan
        // Product::factory(20)->create(); // hati-hati duplikasi
    }
}