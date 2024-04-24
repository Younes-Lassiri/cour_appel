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
        Schema::table('complains', function (Blueprint $table) {
            $table->string('senderName');
            $table->string('senderEmail');
            $table->string('complainType');
            $table->string('senderPhone');
            $table->string('senderGender');
            $table->string('senderNaissance');
            $table->string('senderDocumentType');
            $table->string('senderCin');
            $table->string('senderNationality');
            $table->string('crimenalName')->nullable();
            $table->string('crimenalGender')->nullable();
            $table->string('date');
            $table->string('time');
            $table->string('cinImage');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('complains', function (Blueprint $table) {
            //
        });
    }
};
