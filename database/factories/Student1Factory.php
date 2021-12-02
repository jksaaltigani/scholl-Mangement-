<?php

namespace Database\Factories;

use App\Models\bloods;
use App\Models\Clas;
use App\Models\Gard1;
use App\Models\Gender;
use App\Models\international;
use App\Models\Religion;
use App\Models\Section1;
use App\Models\Student1;
use Illuminate\Database\Eloquent\Factories\Factory;

class Student1Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'name' =>  $this->faker->name(),
            'email' =>  $this->faker->email(),
            'password' => '1234567890',
            'gender_id' => Gender::all()->random(),
            'international_id' => international::all()->random(),
            'blood_id' => bloods::all()->random(),
            'relagin_id' => Religion::all()->random(),
            'gard_id' => Gard1::all()->random(),
            'class_id' => Clas::all()->random(),
            'section_id' => Section1::all()->random(),
            'parent_id' => \App\Models\parent1::all()->random(),
        ];
    }
}