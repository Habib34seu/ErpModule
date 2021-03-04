<?php

namespace App\Http\Controllers;

use App\Models\BuyerInfo;
use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;

class BuyerInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = BuyerInfo::get();
        return response()->json($buyers,200);
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
            'area'=>'max:255',
            'city'=>'max:255',
            'state'=>'max:255',
            'phone'=>'max:20',
            'fax'=>'max:20',
            'zip_code'=>'max:20',
            'email'=>'max:50',
            'web'=>'max:255',
            'buyer_type'=>'required',
            'country_id'=>'required',

        ]);
        $count = DB::table('buyer_infos')->get()->count();
        $code_gen= IdGenerator::generate(['table' => 'buyer_infos', 'length' => 10, 'prefix' =>date('ymd')]);
        $code_genarate =$code_gen +$count ;
        $buyerInfo = BuyerInfo::create([
            'id'=>$code_genarate,
            'name'=>$request->name,
            'address'=>$request->address,
            'city'=>$request->city,
            'state'=>$request->state,
            'phone'=>$request->phone,
            'fax'=>$request->fax,
            'zip_code'=>$request->zip_code,
            'email'=>$request->email,
            'web'=>$request->web,
            'buyer_type'=>$request->buyer_type,
            'country_id'=>$request->country_id,
        ]);
        return response()->json('success',200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BuyerInfo  $buyerInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $buyerInfo = BuyerInfo::findOrFail($id);
        $buyerInfo->update($request->all());
        return ['message'=>'Update Successfully'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BuyerInfo  $buyerInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(BuyerInfo $buyer)
    {
        if($buyer){
            $buyer->delete();

            return response()->json('success', 200);
        }else {
            return response()->json('failed', 404);
        }
    }
}
