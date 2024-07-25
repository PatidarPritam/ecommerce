<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Faker\Factory as Faker;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Generate multiple products with random data
        $numberOfProducts = 20; // Adjust the number of products you want to create

        for ($i = 0; $i < $numberOfProducts; $i++) {
            Product::create([
                'name' => $faker->sentence(2),
                'description' => $faker->paragraph,
                'price' => $faker->randomFloat(2, 10, 1000),
                'stock' => $faker->numberBetween(0, 100),
                // Assuming you have images stored in storage/app/public/images
                'image' => 'images/' . $faker->randomElement(['mobile.jpeg  ', 'laptop.jpg', 'tablet.jpeg']),
            ]);
        }
    }
}
