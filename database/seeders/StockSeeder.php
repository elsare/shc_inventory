<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Master\Stock;

class StockSeeder extends Seeder
{
    
    public function run()
    {
        Stock::create([
        	'part_number_id' => '1',
        	'jumlah_stock' => '1000',
        	'created_at' => date('Y-m-d H:i:s')
        ]);

        Stock::create([
        	'part_number_id' => '2',
        	'jumlah_stock' => '2000',
        	'created_at' => date('Y-m-d H:i:s')
        ]);

        Stock::create([
        	'part_number_id' => '3',
        	'jumlah_stock' => '3000',
        	'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
