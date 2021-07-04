<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OutputBarang extends Model
{
    use HasFactory;

    protected $table = 'output';

    protected $primaryKey = 'output_barang_id';

    protected $guarded = [];
}
