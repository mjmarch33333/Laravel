<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->increments('appt_id');
            $table->integer('user_id');
            $table->integer('site_id');
            $table->text('comments');
            $table->date('appt_date');
            $table->integer('appt_start_hour');
            $table->integer('appt_start_minute');
            $table->integer('appt_end_hour');
            $table->integer('appt_end_minute');
            $table->string('appt_with');
            $table->integer('appt_with_id');
            $table->integer('sms_1day');
            $table->integer('sms_1hour');
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
        Schema::drop('appointments');
    }
}
