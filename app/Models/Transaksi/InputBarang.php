<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InputBarang extends Model
{
    use HasFactory;

    protected $table = 'input_barang';

    protected $primaryKey = 'input_barang_id';

    protected $guarded = [];
}
