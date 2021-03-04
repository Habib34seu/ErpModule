<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShipmentJobInvoiceDetail extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $primaryKey = 'job_inv_id'; // or null

    public $incrementing = false;
}
