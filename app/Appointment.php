<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
	protected $table = 'appointments';
    protected $fillable = ['user_id', 'site_id', 'start_date_time', 'end_date_time', 'comments', 'appt_date', 'appt_start_hour', 'appt_start_minute', 'appt_end_hour', 'appt_end_minute', 'sms_1day', 'sms_1hour', 'appt_with', 'appt_with_id'];
}
