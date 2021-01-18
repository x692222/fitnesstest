<?php

namespace App\Observers;

use App\Models\Product;

class ProductObserver
{

    private $multiplyDecimals = 1000;

    /**
     * @param Product $product
     */
    public function retrieved(Product $product) {
        $product->price = $product->price/$this->multiplyDecimals;
    }

    /**
     * @param Product $product
     */
    public function creating(Product $product) {
        $product->price = $product->price*$this->multiplyDecimals;
    }

    /**
     * @param Product $product
     */
    public function updating(Product $product) {
        $product->price = $product->price*$this->multiplyDecimals;
    }

}
