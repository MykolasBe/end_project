<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableApplicationDetailedInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('table_application_detailed_info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('experience');
            $table->date('experience_from');
            $table->date('experience_to');
            $table->string('location');
            $table->integer('application_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('table_application_detailed_info');
    }
}
