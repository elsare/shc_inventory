<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JumlahOutput extends Model
{
    use HasFactory;

    protected $table = 'jumlah_output';

    protected $primaryKey = 'jumlah_output_id';

    protected $guarded = [];
}
