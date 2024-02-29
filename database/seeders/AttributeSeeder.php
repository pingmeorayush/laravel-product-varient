<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Repositories\ProductRepositoryInterface;
use App\Models\Attribute;
use App\Repositories\ProductRepository;

class AttributeSeeder extends Seeder
{
    // protected $productRepository;

    // public function __construct(
    //     ProductRepositoryInterface $productRepository
    // ) {
    //     $this->productRepository = $productRepository;
    // }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tShirtProduct = (new ProductRepository)->findByName('T-Shirt');

        Attribute::insert([
            [
                'product_id' => $tShirtProduct->id,
                'name' => Attribute::COLOUR
            ],
            [
                'product_id' => $tShirtProduct->id,
                'name' => Attribute::SIZE
            ],
        ]);
    }
}
