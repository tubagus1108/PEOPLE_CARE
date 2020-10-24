<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubdistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('subdistrict')){
            Schema::create('subdistrict', function (Blueprint $table) {
                $table->id();
                $table->integer('city_id');
                $table->string('name');
                $table->string('longtitude');
                $table->string('latitude');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subdistrict');
    }
}
