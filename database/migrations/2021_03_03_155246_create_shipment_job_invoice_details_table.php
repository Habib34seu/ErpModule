<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentJobInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipment_job_invoice_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('buyer_id');
            $table->unsignedBigInteger('country_id');
            $table->string('job_no');
            $table->string('inv_no');
            $table->unsignedBigInteger('inv_value');
            $table->date('inv_date')->nullable();
            $table->string('article_no');
            $table->string('article_no_del')->nullable();
            $table->string('order_no');
            $table->string('order_no_del')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipment_job_invoice_details');
    }
}
