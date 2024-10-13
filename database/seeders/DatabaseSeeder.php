<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ProductFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Product::factory(2)
            ->sequence([
                'name' => 'Offre Basic',
                'description' => 'Description Offre Basic',
                'price' => 9.99,
                'stripe_product_id' => 'price_1Q8kKaBZ5MjNkPF78BoWxofK',
            ],
            [
                'name' => 'Offre Premium',
                'description' => 'Description Offre Premium',
                'price' => 19.99,
                'stripe_product_id' => 'price_1Q8kLWBZ5MjNkPF76epMTfp4',
            ])
            ->create();
    }
}
