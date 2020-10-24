<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRescuerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rescuer')){
            Schema::create('rescuer', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->integer('subdistrict_id');
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
        Schema::dropIfExists('rescuer');
    }
}
