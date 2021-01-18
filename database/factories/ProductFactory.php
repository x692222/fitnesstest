<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * The maximum word count for Faker to generate words
     *
     * @var int
     */
    private $fakerMacWordCount = 5;

    /**
     * Price generator, round to the nearest 100 // @todo
     * Cents are not being catered for
     *
     * @return int
     */
    private function makePrice(): int
    {
        return round(mt_rand(1000,10000),100); // @todo round nie
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => (Category::inRandomOrder()->first())->id,
            'name' => $this->faker->words(mt_rand(1,$this->fakerMacWordCount),true),
            'sku' => $this->faker->unique()->isbn13,
            'price' => $this->makePrice()
        ];
    }
}
