<?php

namespace Database\Factories;

use App\Models\Slider;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
     return[
            'slider_name' => $this->faker->sentence(3),
            'slider_shot_description' => $this->faker->sentence(150),
            'slider_image' => $this->faker->randomElement([ 'slide1.jpg','slide2.jpg','slide3.jpg']),
            'slider_status' => 1,
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
