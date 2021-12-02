<?php

namespace Database\Factories;

use App\Models\Gender;
use App\Models\Specialzation;
use App\Models\Teacher1;
use Illuminate\Database\Eloquent\Factories\Factory;

class Teacher1Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Teacher1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => ['ar' => $this->faker->name(), 'en' => $this->faker->name()],
            'email' => $this->faker->email(),
            'password'  => bcrypt(12345),
            'Specialzation_id' => Specialzation::get()->random()->id,
            'gander_id' => Gender::get()->random()->id,
            'join_data' => '123-213-213',
            'Address' => '123-213-213',
        ];
    }
}