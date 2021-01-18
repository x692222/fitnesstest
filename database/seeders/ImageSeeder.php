<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Services\FakerImageService;
use Illuminate\Database\Seeder;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // add dummy images to each product
        $products = Product::all();
        foreach($products as $product) {
            // copy remote faker images
            $productImages = (new FakerImageService)->handle();
            foreach($productImages['data'] as $productImage) {
                $product->images()->create(
                    [
                        'path' => sprintf('%s/%s',$productImages['imageGroupSelected'],$productImage)
                    ]
                );
            }
        }
    }
}
