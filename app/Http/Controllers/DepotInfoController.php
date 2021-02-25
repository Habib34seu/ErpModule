<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPoint;
use App\Models\DepotInfo;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class DepotInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function index()
    {
        $depotInfos = DepotInfo::get();
        return response()->json($depotInfos,200);
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
            'name'=>'required',
            'address'=>'required',
            'delivery_point_id'=>'required',
        ]);
        $count = DB::table('depot_infos')->get()->count();
        $code_gen= IdGenerator::generate(
            [
                'table' => 'depot_infos', 'length' => 10, 'prefix' =>date('ymd')
            ]);
        $code_genarate =$code_gen +$count ;
        $depotInfo = DepotInfo::create([
            'code'=>$code_genarate,
            'name'=>$request->name,
            'address'=>$request->address,
            'delivery_point_id'=>$request->delivery_point_id,
        ]);
        return response()->json('success',200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $depotInfo = DepotInfo::findOrFail($id);
        $depotInfo->update($request->all());
        return ['message'=>'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepotInfo $depotInfo)
    {
        if($depotInfo){
            $depotInfo->delete();

            return response()->json('success', 200);
        }else {
            return response()->json('failed', 404);
        }
    }
}
