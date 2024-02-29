<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Repositories\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;

class ProductSeeder extends Seeder
{
    // protected $categoryRepository;

    // public function __construct(
    //     CategoryRepositoryInterface $categoryRepository
    // ) {
    //     $this->categoryRepository = $categoryRepository;
    // }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clothesCategory = (new CategoryRepository)->findByName('Clothes');

        $product = Product::factory()->create([
            'name' => 'T-Shirt'
        ]);

        $clothesCategory->products()->attach($product);
    }
}
