<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahInput extends Model
{
    use HasFactory;

    protected $table = 'jumlah_input';

    protected $primaryKey = 'jumlah_input_id';

    protected $guarded = [];
}
