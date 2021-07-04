<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PartNumber extends Model
{
    use HasFactory;

    protected $table = 'part_number';

    protected $primaryKey = 'part_number_id';

    protected $guarded = [];
}
