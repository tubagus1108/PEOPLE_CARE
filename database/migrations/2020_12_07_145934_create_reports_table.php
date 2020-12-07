<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->integer('rescuer_id')->nullable();
            $table->integer('rest_id')->nullable();
            $table->uuid('people_uid');
            $table->string('report_number');
            $table->integer('report_type'); // 1 . Self Report  2 . Other People  3 . Panic Button
            $table->text('description')->nullable();
            $table->string('prove_images1')->nullable();
            $table->dateTime('is_accepted')->nullable();
            $table->text('why_rejected')->nullable();
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
        Schema::dropIfExists('reports');
    }
}
