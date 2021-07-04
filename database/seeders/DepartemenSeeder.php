<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master\Departemen;
use Illuminate\Support\Facades\Crypt;

class DepartemenSeeder extends Seeder
{
     public function run()
    {
        Departemen::create([
            'nama_departemen' 	=> 'SEIN',
            'password'			=> Crypt::encryptString('123456')
        ]);

        Departemen::create([
            'nama_departemen' 	=> 'Kitting',
            'password'			=> Crypt::encryptString('123456')
        ]);

        Departemen::create([
            'nama_departemen' 	=> 'Repair',
            'password'			=> Crypt::encryptString('123456')
        ]);

        Departemen::create([
            'nama_departemen'   => 'IQC',
            'password'          => Crypt::encryptString('123456')
        ]);

        Departemen::create([
            'nama_departemen'   => 'Operator',
            'password'          => Crypt::encryptString('123456')
        ]);

        Departemen::create([
            'nama_departemen'   => 'Semi Assy',
            'password'          => Crypt::encryptString('123456')
        ]);
    }
}
