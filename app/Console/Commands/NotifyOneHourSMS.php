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

        //Start Curl
        $cURL = curl_init();
        curl_setopt($cURL,CURLOPT_HTTPGET,true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
        for ($x = 0; $x < count($sms1day); $x++)  
        {
            echo 'Sending SMS message';
            $currentRow=$sms1day[$x];
            //Send SMS
            $licenseKey = env('TROPO_TOKEN');
            $dayOfWeek=date('l', strtotime($currentRow->appt_date));
            $month= date("F", strtotime($currentRow->appt_date)); 
            $day = date("d", strtotime($currentRow->appt_date)); 
            $year = date("Y", strtotime($currentRow->appt_date));
            $dateTime = $dayOfWeek." ".$month." ".$day.", ".$year." at ".str_pad($currentRow->appt_start_hour, 2, '0', STR_PAD_LEFT).":".str_pad($currentRow->appt_start_minute, 2, '0', STR_PAD_LEFT);
            $dateTime = str_replace(' ', '%20', $dateTime);
            $appt_with = str_replace(' ', '%20', $currentRow->appt_with);
            $date_time_out = $currentRow->appt_date . 'at'. str_pad($currentRow->appt_start_hour, 2, '0', STR_PAD_LEFT) . ':' . str_pad($currentRow->appt_start_minute, 2, '0', STR_PAD_LEFT);
            $date_time_out = str_replace(' ', '%20', $date_time_out);
            $baseurl='https://api.tropo.com/1.0/sessions?action=create&token='.$licenseKey;
            $url= $baseurl . '&numberToDial=1'.$currentRow->phone_number.'&apptwith='.$appt_with.'&datetime='.$dateTime;
            curl_setopt($cURL,CURLOPT_URL,$url);
            $result = curl_exec($cURL);
            sleep(5);
        }         
        //Close Curl
        curl_close($cURL);
    }
}
