<?php

namespace Database\Seeders;

use App\Models\Clas;
use App\Models\ClassRoom;
use App\Models\Fee1;
use App\Models\Gard1;
use App\Models\Gards;
use App\Models\parent1;
use App\Models\Section;
use App\Models\Section1;
use App\Models\Student1;
use App\Models\Teacher;
use App\Models\Teacher1;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(blodSeeder::class);
        $this->call(religion::class);
        $this->call(GenderSedder::class);
        $this->call(Spachliations::class);
        $this->call(internationanl::class);

        Gard1::factory(3)->create();
        Clas::factory(5)->create();
        Teacher1::factory(10)->create();
        Section1::factory(25)->create();
        parent1::factory(30)->create();
        Student1::factory(60)->create();
        Fee1::factory(5)->create();
    }
}