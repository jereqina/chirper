<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        foreach (range(1, 20) as $index) {
            Product::create([
                'ProductName' => $faker->word(),
                'UnitPrice' => $faker->randomFloat(2, 1, 100),
                'StockQuantity' => $faker->numberBetween(1, 200),
                'ReorderLevel' => $faker->numberBetween(1, 50),
                'category_id' => 1, // Ensure this ID exists in the categories table
                'supplier_id' => 1, // Ensure this ID exists in the suppliers table
            ]);
        }
    }
}
