<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            if(config('database.default') == 'pgsql')
                $table->string('uid')->default(DB::raw('gen_uuid()'))->primary();
            else if(config('database.default') == 'mysql')
                $table->string('uid')->default(DB::raw('uuid()'))->primary();
            $table->string('national_id');
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('idcard_image');
            $table->string('selfie_idcard_image');
            $table->dateTime('accepted')->nullable();
            $table->dateTime('pending')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
