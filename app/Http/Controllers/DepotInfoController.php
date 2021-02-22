<?php

namespace App\Http\Controllers;

use App\Models\DeliveryPoint;
use App\Models\DepotInfo;
use Illuminate\Http\Request;

class DepotInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     *
     */
    public function deliveryPoint()
    {
        $deliveryPoints = DeliveryPoint::get();
        return response()->json($deliveryPoints,200);
    }
    public function index()
    {
        $depotInfos = DepotInfo::get();
        return response()->json($depotInfos,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function show(DepotInfo $depotInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(DepotInfo $depotInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DepotInfo $depotInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DepotInfo  $depotInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(DepotInfo $depotInfo)
    {
        //
    }
}
