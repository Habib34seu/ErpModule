<?php

namespace App\Http\Controllers;

use App\Models\ShipmentJobInvoiceDetail;
use Illuminate\Http\Request;

class ShipmentJobInvoiceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipmentJobInvoiceDetails = ShipmentJobInvoiceDetail::get();

        return response()->json($shipmentJobInvoiceDetails,200);
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
     * @param  \App\Models\ShipmentJobInvoiceDetail  $shipmentJobInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function show(ShipmentJobInvoiceDetail $shipmentJobInvoiceDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShipmentJobInvoiceDetail  $shipmentJobInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(ShipmentJobInvoiceDetail $shipmentJobInvoiceDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShipmentJobInvoiceDetail  $shipmentJobInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShipmentJobInvoiceDetail $shipmentJobInvoiceDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShipmentJobInvoiceDetail  $shipmentJobInvoiceDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShipmentJobInvoiceDetail $shipmentJobInvoiceDetail)
    {
        //
    }
}
