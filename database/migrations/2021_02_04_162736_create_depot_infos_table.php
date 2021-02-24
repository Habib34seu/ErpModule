<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepotInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('depot_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('code')->unique();
            $table->string('name');
            $table->string('address');
            $table->bigInteger('delivery_point_id');
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
        Schema::dropIfExists('depot_infos');
    }
}
