<?php

namespace App\Console\Commands;

use Mail;
use DB;
use Illuminate\Console\Command;

class SendEmailNotificationTwoDays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sendemailnotificationtwodays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify users they have an appointment two days in advance.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        date_default_timezone_set('America/New_York');
        $tomorrowDate=date('Y-m-d', strtotime("+2 day", strtotime(date('Y-m-d'))));
        $sms1day = DB::table('appointments')
            ->where('appt_date', '=', $tomorrowDate)
            ->where('sms_1day', '=', 1)
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->get();

        for ($x = 0; $x < count($sms1day); $x++)  
        {
            echo "Sending Email";
            $currentRow=$sms1day[$x];
            Mail::queue('email.reminder', ['currentRow' => $currentRow], function ($m) use ($currentRow) {
                $m->to($currentRow->email, $currentRow->name)->subject('Appointment Reminder for ' . $currentRow->name);
                $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
            });
        } 
    }
}
