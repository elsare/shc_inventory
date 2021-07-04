<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPart extends Model
{
    use HasFactory;

    protected $table = 'model';

    protected $primaryKey = 'model_id';

    protected $guarded = [];
}
