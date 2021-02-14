<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPoint;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryPoints = DeliveryPoint::get();
        return response()->json($deliveryPoints,200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'del_point_name'=>'required'
        ]);
        //return  DeliveryPoint::where('id')->count();
        $count = DB::table('delivery_points')->get()->count();
        $code_gen= IdGenerator::generate(['table' => 'delivery_points', 'length' => 10, 'prefix' =>date('ymd')]);
        $code_genarate =$code_gen +$count ;
        $deliveryPoint = DeliveryPoint::create([
            'code'=>$code_genarate,
            'del_point_name'=>$request->del_point_name,
        ]);
        return response()->json('success',200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DeliveryPoint  $deliveryPoint
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryPoint $deliveryPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeliveryPoint  $deliveryPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryPoint $deliveryPoint)
    {
        //
    }
}
