<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Attribute;
use App\Models\Product;

class AttributeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => Attribute::ATTRIBUTES[array_rand(Attribute::ATTRIBUTES)],
            'product_id' => Product::factory(),
        ];
    }
}
