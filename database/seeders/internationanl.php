<?php

namespace Database\Seeders;

use App\Models\international;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class internationanl extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('internationals')->delete();
        $nationals = [

            [
                'en' => 'Palauan',
                'ar' => 'بالاوي'
            ],
            [

                'en' => 'Palestinian',
                'ar' => 'فلسطيني'
            ],
            [

                'en' => 'Panamanian',
                'ar' => 'بنمي'
            ],
            [

                'en' => 'Papua New Guinean',
                'ar' => 'بابوي'
            ],
            [

                'en' => 'Paraguayan',
                'ar' => 'بارغاوي'
            ],
            [

                'en' => 'Peruvian',
                'ar' => 'بيري'
            ],
            [

                'en' => 'Filipino',
                'ar' => 'فلبيني'
            ],
            [

                'en' => 'Pitcairn Islander',
                'ar' => 'بيتكيرني'
            ],
            [

                'en' => 'Polish',
                'ar' => 'بوليني'
            ],
            [

                'en' => 'Portuguese',
                'ar' => 'برتغالي'
            ],
            [

                'en' => 'Puerto Rican',
                'ar' => 'بورتي'
            ],
            [

                'en' => 'Qatari',
                'ar' => 'قطري'
            ],
            [

                'en' => 'Reunionese',
                'ar' => 'ريونيوني'
            ],
            [

                'en' => 'Romanian',
                'ar' => 'روماني'
            ],
            [

                'en' => 'Russian',
                'ar' => 'روسي'
            ],
            [

                'en' => 'Rwandan',
                'ar' => 'رواندا'
            ],
            [

                'en' => '',
                'ar' => 'Kittitian/Nevisian'
            ],
            [

                'en' => 'St. Martian(French)',
                'ar' => 'ساينت مارتني فرنسي'
            ],
            [

                'en' => 'St. Martian(Dutch)',
                'ar' => 'ساينت مارتني هولندي'
            ],
            [

                'en' => 'St. Pierre and Miquelon',
                'ar' => 'سان بيير وميكلوني'
            ],
            [

                'en' => 'Saint Vincent and the Grenadines',
                'ar' => 'سانت فنسنت وجزر غرينادين'
            ],
            [

                'en' => 'Samoan',
                'ar' => 'ساموي'
            ],
            [

                'en' => 'Sammarinese',
                'ar' => 'ماريني'
            ],
            [

                'en' => 'Sao Tomean',
                'ar' => 'ساو تومي وبرينسيبي'
            ],
            [

                'en' => 'Saudi Arabian',
                'ar' => 'سعودي'
            ],
            [

                'en' => 'Senegalese',
                'ar' => 'سنغالي'
            ],
            [

                'en' => 'Serbian',
                'ar' => 'صربي'
            ],
            [

                'en' => 'Seychellois',
                'ar' => 'سيشيلي'
            ],
            [

                'en' => 'Sierra Leonean',
                'ar' => 'سيراليوني'
            ],
            [

                'en' => 'Singaporean',
                'ar' => 'سنغافوري'
            ],
            [

                'en' => 'Slovak',
                'ar' => 'سولفاكي'
            ],
            [

                'en' => 'Slovenian',
                'ar' => 'سولفيني'
            ],
            [

                'en' => 'Solomon Island',
                'ar' => 'جزر سليمان'
            ],
            [

                'en' => 'Somali',
                'ar' => 'صومالي'
            ],
            [

                'en' => 'South African',
                'ar' => 'أفريقي'
            ],
            [

                'en' => 'South Georgia and the South Sandwich',
                'ar' => 'لمنطقة القطبية الجنوبية'
            ],
            [

                'en' => 'South Sudanese',
                'ar' => 'سوادني جنوبي'
            ],
            [

                'en' => 'Spanish',
                'ar' => 'إسباني'
            ],
            [

                'en' => 'St. Helenian',
                'ar' => 'هيلاني'
            ],
            [

                'en' => 'Sudanese',
                'ar' => 'سوداني'
            ],
            [

                'en' => 'Surinamese',
                'ar' => 'سورينامي'
            ],
            [

                'en' => 'Svalbardian/Jan Mayenian',
                'ar' => 'سفالبارد ويان ماين'
            ],
            [

                'en' => 'Swazi',
                'ar' => 'سوازيلندي'
            ],
            [

                'en' => 'Swedish',
                'ar' => 'سويدي'
            ],
            [

                'en' => 'Swiss',
                'ar' => 'سويسري'
            ],
            [

                'en' => 'Syrian',
                'ar' => 'سوري'
            ],
            [

                'en' => 'Taiwanese',
                'ar' => 'تايواني'
            ],
            [

                'en' => 'Tajikistani',
                'ar' => 'طاجيكستاني'
            ],
            [

                'en' => 'Tanzanian',
                'ar' => 'تنزانيي'
            ],
            [

                'en' => 'Thai',
                'ar' => 'تايلندي'
            ],
            [

                'en' => 'Timor-Lestian',
                'ar' => 'تيموري'
            ],
            [

                'en' => 'Togolese',
                'ar' => 'توغي'
            ],
            [

                'en' => 'Tokelaian',
                'ar' => 'توكيلاوي'
            ],
            [

                'en' => 'Tongan',
                'ar' => 'تونغي'
            ],
            [

                'en' => 'Trinidadian/Tobagonian',
                'ar' => 'ترينيداد وتوباغو'
            ],
            [

                'en' => 'Tunisian',
                'ar' => 'تونسي'
            ],
            [

                'en' => 'Turkish',
                'ar' => 'تركي'
            ],
            [

                'en' => 'Turkmen',
                'ar' => 'تركمانستاني'
            ],
            [

                'en' => 'Turks and Caicos Islands',
                'ar' => 'جزر توركس وكايكوس'
            ],
            [

                'en' => 'Tuvaluan',
                'ar' => 'توفالي'
            ],
            [

                'en' => 'Ugandan',
                'ar' => 'أوغندي'
            ],
            [

                'en' => 'Ukrainian',
                'ar' => 'أوكراني'
            ],
            [

                'en' => 'Emirati',
                'ar' => 'إماراتي'
            ],
            [

                'en' => 'British',
                'ar' => 'بريطاني'
            ],
            [

                'en' => 'American',
                'ar' => 'أمريكي'
            ],
            [

                'en' => 'US Minor Outlying Islander',
                'ar' => 'أمريكي'
            ],
            [

                'en' => 'Uruguayan',
                'ar' => 'أورغواي'
            ],
            [

                'en' => 'Uzbek',
                'ar' => 'أوزباكستاني'
            ],
            [

                'en' => 'Vanuatuan',
                'ar' => 'فانواتي'
            ],
            [

                'en' => 'Venezuelan',
                'ar' => 'فنزويلي'
            ],
            [

                'en' => 'Vietnamese',
                'ar' => 'فيتنامي'
            ],
            [

                'en' => 'American Virgin Islander',
                'ar' => 'أمريكي'
            ],
            [

                'en' => 'Vatican',
                'ar' => 'فاتيكاني'
            ],
            [

                'en' => 'Wallisian/Futunan',
                'ar' => 'فوتوني'
            ],
            [

                'en' => 'Sahrawian',
                'ar' => 'صحراوي'
            ],
            [

                'en' => 'Yemeni',
                'ar' => 'يمني'
            ],
            [

                'en' => 'Zambian',
                'ar' => 'زامبياني'
            ],
            [

                'en' => 'Zimbabwean',
                'ar' => 'زمبابوي'
            ]
        ];

        foreach ($nationals as $n) {

            international::create(['name' => ['en' => $n['en'], 'ar' => $n['ar']]]);
        }
    }
}