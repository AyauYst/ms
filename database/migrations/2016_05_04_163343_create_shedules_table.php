<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_shedules_id');
            $table->integer('day_id');
            $table->integer('subject_id');
            $table->integer('lesson_number');//this->lesson_number == periods->lesson_number && periods->study_form_id == myGroup->study_form_id
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shedules');
    }
}
