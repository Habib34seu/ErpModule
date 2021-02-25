<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleInfo extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey = 'id'; // or null

    public $incrementing = false;
}
