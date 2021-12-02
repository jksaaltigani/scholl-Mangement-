<?php

namespace Database\Factories;

use App\Models\Clas;
use App\Models\Gard1;
use App\Models\Section1;
use App\Models\Teacher1;
use Illuminate\Database\Eloquent\Factories\Factory;

class Section1Factory extends Factory
{
	/**
	 * The name of the factory's corresponding model.
	 *
	 * @var string
	 */
	protected $model = Section1::class;

	/**
	 * Define the model's default state.
	 *
	 * @return array
	 */
	public function definition()
	{
		return [
			'name' => ['ar' => $this->faker->name(), 'en ' => $this->faker->name()],
			'notes'  => $this->faker->text,
			'gard_id' => Gard1::all()->random(),
			'class_id' => Clas::all()->random(),
			'teacher_id' => Teacher1::all()->random(),
		];
	}
}