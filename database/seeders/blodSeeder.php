<?php

namespace Database\Seeders;

use App\Models\bloods;
use Faker\Core\Blood;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class blodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bloods')->delete();

        $bgs = ['O-', 'O+', 'A+', 'A-', 'B+', 'B-', 'AB+', 'AB-'];

        foreach ($bgs as  $bg) {
            bloods::create(['Name' => $bg]);
        }
    }
}
