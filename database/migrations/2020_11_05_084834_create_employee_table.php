<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('admin')){
            Schema::create('employee', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'))->primary();
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'))->primary();
                $table->integer('rest_id');
                $table->string('name');
                $table->string('username');
                $table->string('password');
                $table->string('phone')->nullable();
                $table->string('email')->nullable();
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
        Schema::dropIfExists('employee');
    }
}
