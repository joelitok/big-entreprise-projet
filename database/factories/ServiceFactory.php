<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        

        return[
            'service_name' => $this->faker->randomElement([
            'Tracking / Géolocalisation','Vidéosurveillance','Ressources humaines','Contrôle d’accès',
            'Biométrie','Matériels']),
            'service_description' => $this->faker->sentence(20),
            'service_image' => '["logo.jpg","logo.jpg"]',
            'service_status' => 1,   
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
