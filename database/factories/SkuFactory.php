<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Product;

class SkuFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::factory(),
            'sku' => Str::random(8),
            'unit_amount' => $this->faker->randomFloat(2, 20, 100),
        ];
    }
}
