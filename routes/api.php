<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('country','\App\Http\Controllers\CountryController');
Route::resource('/deliveryPoint','\App\Http\Controllers\DeliveryPointController');
Route::resource('/depotInfo','\App\Http\Controllers\DepotInfoController');
Route::resource('/vehicleInfo','\App\Http\Controllers\VehicleInfoController');
Route::resource('/buyerInfo','\App\Http\Controllers\BuyerInfoController');
Route::resource('/jobInvDetails','\App\Http\Controllers\ShipmentJobInvoiceDetailController');
Route::resource('/transportAgent','\App\Http\Controllers\TransportAgentController');

