<?php

namespace App\Http\Controllers;

use Request;
use App\Appointment;
use App\User;
use DB;
use App\Quotation;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $output = "hi " . \Auth::user()->name;
        return $output;
    }

    public function viewAll()
    {

        $appointments = DB::table('appointments')
            ->leftJoin('users', 'appointments.user_id', '=', 'users.id')
            ->orderBy('appt_date', 'asc', 'appt_hour', 'asc', 'appt_minute', 'asc')
            ->get();

        return view('appointments.showall', compact('appointments'));
    }

    public function viewByUser($id)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        // I had to add use DB; and use App\Quotation; above to get below query to work
        $appointments = DB::table('users')
            ->where('users.id', '=', $id) 
            ->leftJoin('appointments', 'users.id', '=', 'appointments.user_id')
            ->get();

        return view('appointments.showall', compact('appointments'));
    }


    private function getApptBetweenDate($firstDate, $secondDate)
    {
        $appointments = DB::table('appointments')
            ->where('appt_date', '>=', $firstDate)
            ->where('appt_date', '<=', $secondDate) 
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->orderBy('appointments.appt_date', 'asc')
            ->orderBy('appointments.appt_start_hour', 'asc')
            ->orderBy('appointments.appt_start_minute', 'asc')
            ->orderBy('appointments.appt_end_hour', 'desc')
            ->orderBy('appointments.appt_end_minute', 'asc')
            ->get();
        $count=1;
        $intervalappt=1;
        for ($x = 0; $x < count($appointments); $x++) 
        {
            if($count<2)
            {
                $intervalappt = DB::table('appointments')
                    ->where('appt_date', '=', $appointments[$x]->appt_date)
                    ->where('appt_start_hour', '>=', $appointments[$x]->appt_start_hour)
                    ->where('appt_start_hour', '<', $appointments[$x]->appt_end_hour)
                    ->count();
            }
            $appointments[$x]->intervalappt=$intervalappt;
            $appointments[$x]->intervalCount=$count;
            if($intervalappt==$count)
            {
                $count=1;
            }
            else
            {
                $count++;
            }
        } 
        return $appointments;
    }

    public function viewByDate($date)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $newDate = date('Y-m-d', strtotime('-3 day', strtotime($date)));

        //$appointments=self::getAllTodayAppt($date);
        $startDate=date('Y-m-d', strtotime('-3 day', strtotime($date)));
        $endDate=date('Y-m-d', strtotime('+3 day', strtotime($date)));
        $appointments=self::getApptBetweenDate($startDate, $endDate);
        return view('appointments.viewcalendar', ['startDate' => $startDate], compact('appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate($date, $hour, $minute, $user)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $apptpeople = DB::table('users')
            ->where('users.schedule_site_id', '>', '0') 
            ->get();

        return view('appointments.create', compact('apptpeople'));
    }

    public function getUserSchedule($date, $hour, $minute)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $apptpeople = DB::table('users')->get();
        $appointment['date'] = $date;
        $appointment['hour'] = $hour;
        $appointment['minute'] = $minute;
        return view('appointments.selectuser', compact('appointment'), compact('apptpeople'));
    }

    public function store() 
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        $input = Request::all();

        $appt_with_name = DB::table('users')
            ->select('name')
            ->where('users.id', '=', $input['appt_with_id']) 
            ->get();

        $input['user_id'] = 2;
        $input['site_id'] = 1;
        $input['appt_with'] = $appt_with_name[0]->name;
 
        Appointment::create($input);

        return redirect('appointments');
    }

    public function edit($id)
    {
        $admin = \Auth::user()->admin_site_id;

        if ($admin < 1)
        {
             return redirect('home');
        }

        // I had to add use DB; and use App\Quotation; above to get below query to work
        $appointments = DB::table('appointments')
            ->where('appointments.appt_id', '=', $id) 
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->get();

        $apptpeople = DB::table('users')
            ->where('users.schedule_site_id', '>', '0') 
            ->get();

        return view('appointments.edit', compact('appointments'), compact('apptpeople'));
    }

    public function update($id) 
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        $input = Request::all();

        $appt_with_name = DB::table('users')
            ->select('name')
            ->where('users.id', '=', $input['appt_with_id']) 
            ->get();

        DB::table('appointments')
            ->where('appt_id', $id)
            ->update(
                ['comments' => $input['comments'],
                'appt_date' => $input['appt_date'], 
                'appt_start_hour' => $input['appt_start_hour'], 
                'appt_start_minute' => $input['appt_start_minute'],
                'appt_end_hour' => $input['appt_end_hour'], 
                'appt_end_minute' => $input['appt_end_minute'],
                'appt_with' => $appt_with_name[0]->name,
                'appt_with_id' => $input['appt_with_id'],
                'sms_1hour' => $input['sms_1hour'],
                'sms_1day' => $input['sms_1day']
                ]);
 
        //Appointment::update($input);

        return redirect('appointments/viewall');
    }

    public function test($date) 
    {
        //$appointments = DB::table('appointments')
         //   ->where('appt_date', '=', $date) 
          //  ->get();
        $appointments = DB::table('appointments')
            ->where('appt_date', '=', $date) 
            ->leftJoin('users', 'users.id', '=', 'appointments.user_id')
            ->orderBy('appointments.appt_start_hour', 'asc')
            ->orderBy('appointments.appt_start_minute', 'asc')
            ->orderBy('appointments.appt_end_hour', 'desc')
            ->orderBy('appointments.appt_end_minute', 'asc')
            ->get();
        $count=1;
        $intervalappt=1;
        for ($x = 0; $x < count($appointments); $x++) 
        {
            if($count<2)
            {
                $intervalappt = DB::table('appointments')
                    ->where('appt_date', '=', $date)
                    ->where('appt_start_hour', '>=', $appointments[$x]->appt_start_hour)
                    ->where('appt_start_hour', '<', $appointments[$x]->appt_end_hour)
                    ->count();
            }
            $appointments[$x]->intervalappt=$intervalappt;
            $appointments[$x]->intervalCount=$count;
            if($intervalappt==$count)
            {
                $count=1;
            }
            else
            {
                $count++;
            }
        } 
        //return $appointments;
        return view('appointments.viewcalendar', compact('appointments'));
    }

}
