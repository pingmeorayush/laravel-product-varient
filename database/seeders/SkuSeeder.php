<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Attribute;
use App\Models\Product;
use App\Models\Sku;
use App\Repositories\ProductRepository;
use App\Repositories\ProductRepositoryInterface;

class SkuSeeder extends Seeder
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
        $colours = [
            'red', 'green', 'blue'
        ];

        $sizes = [
            'small', 'medium', 'large'
        ];

        $tShirtProduct = (new ProductRepository)->findByName('T-Shirt');

        for ($i = 0; $i <= 2; $i++) {
            $tShirtSku = Sku::factory()->create([
                'product_id' => $tShirtProduct->id,
                'unit_amount' => 19.99
            ]);

            Attribute::where('product_id', $tShirtProduct->id)
                ->colour()
                ->first()
                ->skus()
                ->attach($tShirtSku->id, ['value' => $colours[$i]]);

            Attribute::where('product_id', $tShirtProduct->id)
                ->size()
                ->first()
                ->skus()
                ->attach($tShirtSku->id, ['value' => $sizes[$i]]);
        }
    }
}
