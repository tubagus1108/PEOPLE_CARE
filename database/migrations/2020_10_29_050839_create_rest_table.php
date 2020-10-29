<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('rest')){
            Schema::create('rest', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('address');
                $table->string('latitude')->nullable();
                $table->string('longtitude')->nullable();
                $table->integer('type'); // 1. Hospital 2. Firefighter
                $table->timestamps();
                $table->softDeletes();
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
        Schema::dropIfExists('rest');
    }
}
