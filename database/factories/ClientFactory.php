<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

return[
        'firstname' => $this->faker->randomElement(['joel','placide','vida',
        'idriss','landry','ibrahim','legrand','onesin','hida','pascal','pascaline']),
        'lastname' => $this->faker->randomElement([
        'tchoufa','nkouatchet','tchiengue','chimou','chimi','faksse']),
        'email' => $this->faker->randomElement(['joel','placide','vida',
        'idriss','landry','ibrahim','legrand','onesin','hida','pascal','pascaline']).'@'.$this->faker->randomElement(['gbox','gmail','sms',
        'pizza','pirate','promo24','elearning']).'.'.$this->faker->randomElement(['joel','placide','vida',
        'idriss','landry','ibrahim','legrand','onesin','hida','pascal','pascaline']),   
        'phone' => '+237675985291',
        'gender' => $this->faker->randomElement(['male','female']),
        'city' => $this->faker->randomElement(['douala','yaoundé','bafoussam']),
        'password' => bcrypt(('123456789')),
        'status' =>  1,
        // 'type' =>  $this->faker->randomElement(['admin','admin_shop','user',
        // 'delivery_man','admin_sale']),
        'numero'=> rand(0,99909).'secur'
              
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
