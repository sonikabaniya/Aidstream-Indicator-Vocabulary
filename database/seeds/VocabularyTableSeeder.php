<?php

use Illuminate\Database\Seeder;

class VocabularyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Vocabulary')->insert([
            [   'id' => 1,
                'vocab' => 'WHO'
            ],
               
            [   'id' => 2,
                'vocab' => 'Sphere Handbook'
            ],
            
            [   'id' => 3,
                'vocab' => 'World Bank'
            ],
            
            [   'id' => 4,
                'vocab' => 'UN Millenium'
            ],
            
            [   'id' => 5,
                'vocab' => 'UNOCHA Humanitarian'
       
            ],
            
            [   'id' => 6,
                'vocab' => 'HIV/AIDS Indicator'
            ],
            
            [   'id' => 7,
                'vocab' => 'HIPSO'
            ],
            
            [   'id' => 8,          
                'vocab' => 'UN SDG'
            ]
            ]);
    }
}
