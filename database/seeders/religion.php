<?php

namespace Database\Seeders;

use App\Models\Religion as ModelsReligion;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Seeder;

class religion extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $religions = [

            [
                'en' => 'Muslim',
                'ar' => 'مسلم'
            ],
            [
                'en' => 'Christian',
                'ar' => 'مسيحي'
            ],
            [
                'en' => 'Other',
                'ar' => 'غيرذلك'
            ],

        ];

        foreach ($religions as $R) {
            ModelsReligion::create([
                'name' =>
                [
                    'en' => $R['en'], 'ar' => $R['ar']
                ]
            ]);
        }
    }
}