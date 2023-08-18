<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Sku;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         $clothesCategory = Category::factory()->create([
             'name' => 'Clothes'
         ]);

        $electronicsCategory = Category::factory()->create([
            'name' => 'Clothes'
        ]);

        $tShirtProduct = Product::factory()->create([
            'name' => 'T-Shirt'
        ]);

        $computerProduct = Product::factory()->create([
            'name' => 'Computer'
        ]);

        $clothesCategory->products()->attach($tShirtProduct);
        $electronicsCategory->products()->attach($computerProduct);

        for ($i = 1; $i <= 3; $i++) {
            Sku::factory()->create([
                'product_id' => $tShirtProduct->id,
                'sku' => 'T-Shirt SKU ' . $i
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Sku::factory()->create([
                'product_id' => $computerProduct->id,
                'sku' => 'Computer SKU ' . $i
            ]);
        }
    }
}
