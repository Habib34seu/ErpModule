<?php

namespace App\Models;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPoint extends Model
{
    use HasFactory;
    protected $guarded=[];


//    protected $primaryKey='code';
//    public $incrementing=false;
//    public static function boot()
//    {
//        parent::boot();
//
//        self::creating(function ($model) {
//            $model->code= IdGenerator::generate(['table' => 'delivery_points', 'length' => 10, 'prefix' =>date('ymd')]);
//        });
//    }
}
