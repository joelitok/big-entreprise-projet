<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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


    

        return[
    
'product_image' => $this->faker->randomElement([ 
                '["4.jpg"]'
            
            ]),

 'product_name' => $this->faker->randomElement([
'iPhone 11','iPhone XR','iPhone 8','iPhone 12','iPhone 12  Max','iPhone 7','iPhone 12 Mini',' iPhone 12 ',' iPhone 6S',' iPhone SE 2016','iPhone X', 'iPhone 8 Plus','iPhone 11 ',' iPhone 6',
'MacBook Air 13','MacBook  154','MacBook  13','MacBook 12','MacBook  16','MacBook  16','iPad  9.7',' iPad  10.5','iPad  12.9',' iPad  12.9 2018','iPad  11 2018',' iPad  12.9 2020', 'iPad  11 2021',
' iPad  11 2021',' iPad  12.9 2021',' iPad  12.9 2021',' iPhone',' iPhone 5', ' iPhone 5',' iPhone 4S','iPhone 5C','iPhone 5S','iPhone 6','iPhone 6 Plus','iPhone 6S','iPhone 4','iPhone 6S Plus',
'iPhone SE 2016','iPhone 7','iPhone 7 Plus','iPhone 3GS','iPhone 3GS',' iPhone 3G',' iPhone 8','iPhone 8 Plus',' iPhone X','iPhone XR','iPhone XS',' iPhone XS Max',
' iPhone 11','iPhone SE 2020','iPhone 12 ','iPhone 13  Max',' iPhone 13 ','iPhone 13 Mini',' iPad','iPad Air','iPad Air','iPad Mini 2',
'iPad Air 2', 'iPad Mini 3','iPad Mini 4','iPad Mini','iPad 4','iPad 2','iPad 3','iPad Retina','iPad','iPad 9.7 2017','iPad 5','iPad 9.7 2018',
'iPad Air 2019','iPad Mini 5 2019','iPad 2020 10.2','iPad Air 2020','iPad 2021 10.2','iPad Mini 2021','iPod','iPod Touch 5','IPod Nano 5eme Generation',
'IPod Touch 1er Generation','iPod Classic 160Gb',' iPod Classic 80Gb', 'IPod Shuffle',' iPod Nano 7',' iPod Nano 7',' IPod Nano 3eme Generation',' IPod Nano 4eme Generation','iPod Touch 6eme Generation',
               ]),//Str::random(9),//$this->faker->sentence(2),
            'product_description' => $this->faker->sentence(100),
            'product_category' => 'categories'.$this->faker->numberBetween(1,2),
            'product_price' => rand(1000,10000),//Str::random(10),
            'product_status'=>1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
