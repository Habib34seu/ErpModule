<?php

namespace App\Http\Controllers;

use App\Models\VehicleInfo;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VehicleInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicleInfos = VehicleInfo::get();
        return response()->json($vehicleInfos,200);
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
            'vehicle_no'=>'required',
            'vehicle_desc'=>'required',
            'vehicle_purpose'=>'required',
            'party'=>'required',
        ]);
        $count = DB::table('vehicle_infos')->get()->count();
        $code_gen= IdGenerator::generate(
            [
                'table' => 'vehicle_infos', 'length' => 10, 'prefix' =>date('ymd')
            ]);
        $code_genarate =$code_gen +$count ;
        $vehicleInfo = VehicleInfo::create([
            'id'=>$code_genarate,
            'vehicle_no'=>$request->vehicle_no,
            'vehicle_desc'=>$request->vehicle_desc,
            'vehicle_purpose'=>$request->vehicle_purpose,
            'party'=>$request->party,
        ]);
        return response()->json('success',200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VehicleInfo  $vehicleInfo
     * @return \Illuminate\Http\Response
     */
    public function show(VehicleInfo $vehicleInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VehicleInfo  $vehicleInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(VehicleInfo $vehicleInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VehicleInfo  $vehicleInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $vehicleInfo = VehicleInfo::findOrFail($id);
        $vehicleInfo->update($request->all());
        return ['message'=>'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VehicleInfo  $vehicleInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(VehicleInfo $vehicleInfo)
    {
        if($vehicleInfo){
            $vehicleInfo->delete();

            return response()->json('success', 200);
        }else {
            return response()->json('failed', 404);
        }
    }
}
