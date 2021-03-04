<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_infos', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->string('name')->unique();
            $table->text('address');
            $table->text('area')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('phone')->nullable();
            $table->string('fax')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('web')->nullable()->nullable();
            $table->string('buyer_type');
            $table->bigInteger('country_id');
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
        Schema::dropIfExists('buyer_infos');
    }
}
