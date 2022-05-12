<?php

namespace Database\Factories\Dashboard;

use App\Models\Dashboard\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversitySuggestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'alpha_two_code' => 'BR',
            'country' => 'Brasil',
            'domains' => json_encode([$this->faker->url()]),
            'name' => $this->faker->company(),
            'web_pages' => json_encode([$this->faker->url()]),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
