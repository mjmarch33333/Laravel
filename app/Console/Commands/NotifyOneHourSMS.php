<?php

namespace App\Console\Commands;

use Mail;
use DB;
use Illuminate\Console\Command;

class NotifyOneHourSMS extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notifyonehoursms';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will notify users one hour in advance of their appointment.';

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
        $hourPlus2 = date('G')+2; 
        if($hourPlus2>23)
        {
            $hourPlus2=$hourPlus2-24;
            $date = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));
        } 
        else
        {
            $date = date('Y-m-d');
        }
        $sms1day = DB::table('appointments')
            ->where('appt_date', '=', $date)
            ->where('sms_1hour', '=', 1)    
            ->where('appt_start_hour', '=', $hourPlus2)        
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->get();

        for ($x = 0; $x < count($sms1day); $x++)  
        {
            $currentRow=$sms1day[$x];
            Mail::queue('email.reminder', ['currentRow' => $currentRow], function ($m) use ($currentRow) {
                $m->to($currentRow->email, $currentRow->name)->subject('Appointment Reminder for ' . $currentRow->name);
                $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
            });
        }         
    }
}
