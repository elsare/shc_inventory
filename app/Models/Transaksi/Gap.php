<?php

namespace App\Models\Transaksi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gap extends Model
{
    use HasFactory;

    protected $table = 'gap';

    protected $primaryKey = 'gap_id';

    protected $guarded = [];
}
