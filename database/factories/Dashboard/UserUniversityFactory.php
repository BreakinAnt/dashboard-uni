<?php

namespace Database\Factories\Dashboard;

use App\Models\Dashboard\University;
use App\Models\Dashboard\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserUniversityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'university_id' => University::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
