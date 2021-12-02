<?php

namespace Database\Seeders;

use App\Models\Specialzation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Spachliations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aaray = [
            ['en' => 'arabic', 'ar' => 'العربيه'],
            ['en' => 'english', 'ar' => 'الانجليزيه'],
            ['en' => 'mathmatic', 'ar' => 'الرياضيات'],
            ['en' => 'history', 'ar' => 'التاريخ'],
        ];
        // DB::table('specialzations')->delete();

        foreach ($aaray as $arr) {
            Specialzation::create([
                'name' => $arr,
            ]);
        }
    }
}