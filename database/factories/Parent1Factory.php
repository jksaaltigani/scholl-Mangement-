<?php

namespace Database\Factories;

use App\Models\bloods;
use App\Models\Bold;
use App\Models\international;
use App\Models\parent1;
use App\Models\Religion;
use Faker\Core\Blood;
use Illuminate\Database\Eloquent\Factories\Factory;

class Parent1Factory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = parent1::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'Email' =>  $this->faker->email(),
            'Password' => bcrypt(1234567890),


            //Fatherinformation

            'Name_Father' =>  ['ar' => $this->faker->name(), 'en' => $this->faker->name()],

            'Passport_ID_Father' => international::all()->random(),
            'Phone_Father' => '0915477450',

            'Job_Father' => ' mohammed altignai osan',

            'Address_Father' => '11-2222-44444 ',



            'Name_Mother' =>  ['ar' => $this->faker->name(), 'en' => $this->faker->name()],

            'National_ID_Mother' => international::all()->random(),
            'Passport_ID_Mother' => '12323-21323-123 ',
            'Phone_Mother' => '0232312 ',
            'Job_Mother' => 'dsl sdlmds ;lm ',
            'Address_Mother' => 'sdlm sdlm -wsd ',


            'Nationality_Mother_id' => international::all()->random(),
            'National_ID_Father' => international::all()->random(),


            'Blood_Type_Mother_id' => bloods::all()->random(),
            'Blood_Type_Father_id' => bloods::all()->random(),
            'Religion_Mother_id' => 1,

            'Religion_Father_id' => 1,


        ];
    }
}