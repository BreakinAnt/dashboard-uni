<?php

namespace Database\Factories\Dashboard;

use App\Models\Dashboard\UniversityStatus;
use Illuminate\Database\Eloquent\Factories\Factory;

class UniversityFactory extends Factory
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
            'domains' => [$this->faker->url()],
            'name' => $this->faker->company(),
            'web_pages' => [$this->faker->url()],
            'status_id' => UniversityStatus::inRandomOrder()->first()->id
        ];
    }
}
