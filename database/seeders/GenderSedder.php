<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aaray = [
            ['en' => 'male', 'ar' => 'ذكر'],
            ['en' => 'female', 'ar' => 'انثي'],

        ];
        // DB::table('genders')->delete();
        foreach ($aaray as $arr) {
            Gender::create([
                'name' => $arr,
            ]);
        }
    }
}