<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('admin')){
            Schema::create('admin', function (Blueprint $table) {
                if(config('database.default') == 'pgsql')
                    $table->string('uid')->default(DB::raw('gen_uuid()'))->primary();
                else if(config('database.default') == 'mysql')
                    $table->string('uid')->default(DB::raw('uuid()'))->primary();
                $table->string('national_id')->nullable();
                $table->string('name');
                $table->string('username');
                $table->string('email')->unique();
                $table->string('password');
                $table->string('phone')->unique();
                $table->string('avatar')->nullable();
                $table->text('address')->nullable();
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
        Schema::dropIfExists('admin');
    }
}
