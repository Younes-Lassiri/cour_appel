<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demande', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employe_id')->unsigned()->nullable();
            $table->foreign('employe_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('employe_name');
            $table->string('date_from');
            $table->string('date_to');
            $table->string('reason');
            $table->string('status') ;
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
        Schema::dropIfExists('demande_absences');
    }
};
