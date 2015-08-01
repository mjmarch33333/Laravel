<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mail;
use DB;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
       
        date_default_timezone_set('America/New_York');
        return view('home');
    }

    public function test(Request $request, $id)
    {
        $tomorrowDate=date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));

        $sms1day = DB::table('appointments')
            ->where('appt_date', '=', $tomorrowDate)
            ->where('sms_1day', '=', 1)
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->get();

        //Mail::send('home', ['user' => $user], function ($m) use ($user) {
        //    $m->to($user->email, $user->name)->subject('Appointment Reminder3');
        //    $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
        //});
        //Mail::queue('home', ['user' => $user], function ($m) use ($user) {
        //    $m->to($user->email, $user->name)->subject('Initial email from Queue');
        //    $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
        //});

        //for ($x = 0; $x < count($sms1day); $x++)  
        //{
        //    Mail::queue('email.reminder', ['user' => $user], function ($m) use ($user) {
        //        $m->to($user->email, $user->name)->subject('Appointment Reminder for ' . $user->name);
        //        $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
        //    });
        //} 
        echo "testvar: ";
        echo env('TEST_VAR');

        for ($x = 0; $x < count($sms1day); $x++)  
        {
            echo $x;
            echo '<br>';
            $currentRow=$sms1day[$x];
            Mail::queue('email.reminder', ['currentRow' => $currentRow], function ($m) use ($currentRow) {
                $m->to($currentRow->email, $currentRow->name)->subject('Appointment Reminder for ' . $currentRow->name);
                $m->from('admin@wnyautomation.com', 'WNYAUTOMATION');
            });
        } 


        return $sms1day;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
