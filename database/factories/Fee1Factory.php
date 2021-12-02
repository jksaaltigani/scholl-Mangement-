<?php

namespace Database\Factories;

use App\Models\Clas;
use App\Models\Fee1;
use App\Models\Gard1;
use App\Models\Student1;
use Illuminate\Database\Eloquent\Factories\Factory;

class Fee1Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Fee1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'class_id' => Clas::all()->random(),
            'gard_id' => Gard1::all()->random(),
            'years' => '2022',
            'type' => 1,
            'fees' => 4000.00,
        ];
    }
}