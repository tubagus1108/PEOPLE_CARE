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
            $table->string('full_name');
            $table->string('national_id');
            $table->dateTime('date_birth');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('phone')->unique();
            $table->integer('province_id');
            $table->integer('city_id');
            $table->string('idcard_image')->nullable();
            $table->string('selfie_idcard_image')->nullable();
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
