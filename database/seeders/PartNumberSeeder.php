<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master\PartNumber;

class PartNumberSeeder extends Seeder
{
   
    public function run()
    {
        PartNumber::create([
            'model_id'  => '1',
            'part_no'	=> 'GH96-08860A',
            'description' => 'ASSY LCD-4.98"_PLS _TFT_SM-G531F;TFT,PLS'
        ]);

        PartNumber::create([
            'model_id'  => '2',
            'part_no'	=> 'GH96-08995A',
            'description' => 'ASSY OLED-4.3" WVGA J110H WHITE AGRADE;A'
        ]);

        PartNumber::create([
            'model_id'  => '3',
            'part_no'	=> 'GH96-09236A',
            'description' => 'ASSY OLED-5.0" HD J3109 A-GRADE GOLD;AMO'
        ]);
    }
}
