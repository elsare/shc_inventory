<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master\ModelPart;

class ModelSeeder extends Seeder
{
   
    public function run()
    {
        ModelPart::create([
            'nama_model' => 'SM-G532',
        ]);

        ModelPart::create([
            'nama_model' => 'SM-J111',
        ]);

        ModelPart::create([
            'nama_model' => 'SM-J320',
        ]);
    }
}
