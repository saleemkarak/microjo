<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\User;
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
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3,false),
            'slug' => $this->faker->unique()->slug(),
            'summary' =>$this->faker->sentences(2,true), // password
            'description'=>$this->faker->paragraph(),
            'stock'=>$this->faker->numberBetween(2,10),
            'brand_id'=>$this->faker->randomElement(Brand::pluck('id')->toArray()),
            'vendor_id'=>$this->faker->randomElement(User::pluck('id')->toArray()),

            'photo' => $this->faker->imageUrl('400' , '200'),
            'status'=>$this->faker->randomElement(['active','inactive']),
            'cat_id'=>$this->faker->randomElement(Category::where('is_parent',1)->pluck('id')->toArray()),
            'child_cat_id'=>$this->faker->randomElement(Category::where('is_parent',0)->pluck('id')->toArray()),
            'price'=>$this->faker->randomFloat(2,10,2),
            'offer_price'=>$this->faker->randomFloat(2,10,2),
            'discount'=>$this->faker->randomFloat(2,10,2),
            'size'=>$this->faker->randomElement(['S','M','L']),
            'condition'=>$this->faker->randomElement(['new','used','popular']),
            'is_featured'=>$this->faker->randomElement(['0','1']),
            'is_recommended'=>$this->faker->randomElement(['0','1']),
        ];
    }
}
















