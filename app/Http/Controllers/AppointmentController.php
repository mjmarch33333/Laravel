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
        date_default_timezone_set('America/New_York');
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

    public function goToDate($id)
    {
        $input = Request::all();
        return redirect("/appointments/showbydate/" . $input['go_to_date'] . "/" . $id);
    }

    public function viewByUser($id)
    {
        $admin = \Auth::user()->admin_site_id;
        $myid = \Auth::user()->id;
        if ($admin < 1 && $myid <> $id)
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
                //$intervalappt = DB::table('appointments')
                //    ->where('appt_date', '=', $appointments[$x]->appt_date)
                //    ->where('appt_start_hour', '>=', $appointments[$x]->appt_start_hour)
                //    ->where('appt_start_hour', '<', $appointments[$x]->appt_end_hour)
                //    ->count();
                $intervalappt = DB::table('appointments')
                    ->where('appt_date', '=', $appointments[$x]->appt_date)
                    ->where('start_date_time', '>=', $appointments[$x]->start_date_time)
                    ->where('start_date_time', '<', $appointments[$x]->end_date_time)
                    ->count();
                $apptDuring = DB::table('appointments')
                ->where('appt_date', '=', $appointments[$x]->appt_date)
                ->whereBetween('start_date_time', [$appointments[$x]->start_date_time, $appointments[$x]->end_date_time])
                ->orWhereBetween('start_date_time', [$appointments[$x]->start_date_time, $appointments[$x]->end_date_time])
                ->count();
            }

            if($intervalappt<=0)
            {
                $intervalappt=1;   
            }
            $appointments[$x]->intervalappt=$intervalappt;
            $appointments[$x]->intervalappt=$apptDuring;
            $appointments[$x]->intervalappt=5;  // This value here sets how many columns will be used across.
            $appointments[$x]->intervalCount=$count;
            $appointments[$x]->intervalDuring=$apptDuring;
            if($intervalappt<=$count)
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

    public function viewByDate($date, $id)
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
        $apptpeople = DB::table('users')
            ->where('users.schedule_site_id', '>', '0') 
            ->get();
        //return $appointments;
        $data['startDate'] = $startDate;
        $data['user_to_schedule'] = $id;
        return view('appointments.viewcalendar', $data, compact('appointments', 'apptpeople'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function getCreate($date, $hour, $minute)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $input = Request::all();
        $apptpeople = DB::table('users')
            ->where('users.schedule_site_id', '>', '0') 
            ->get();

        $apptuser = DB::table('users')
            ->where('users.id', '=', $input['appt_for_id']) 
            ->first();

        
        $data = [];
        $data['date'] = $date;
        $data['hour'] = $hour;
        $data['minute'] = $minute;
        $data['userid'] = $input['appt_for_id'];
        $data['name'] = $apptuser->name;
        return view('appointments.create', compact('apptpeople'), $data);
    }

    public function getCreateWithUser($date, $hour, $minute, $id)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $apptpeople = DB::table('users')
            ->where('users.schedule_site_id', '>', '0') 
            ->get();

        $apptuser = DB::table('users')
            ->where('users.id', '=', $id) 
            ->first();

        $data = [];
        $data['date'] = $date;
        $data['hour'] = $hour;
        $data['minute'] = $minute;
        $data['userid'] = $id;
        $data['name'] = $apptuser->name;
        return view('appointments.create', compact('apptpeople'), $data);
    }

    public function getUserSchedule($date, $hour, $minute)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $apptpeople = DB::table('users')->get();
        $data = [];
        $data['date'] = $date;
        $data['hour'] = $hour;
        $data['minute'] = $minute;

        return view('appointments.selectuser', compact('apptpeople'), $data);
    }

    public function store($idtoupdate, Requests\AppointmentRequest $request) 
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        $input = Request::all();

        $appt_with_name = DB::table('users')
            ->select('name', 'color')
            ->where('users.id', '=', $input['appt_with_id']) 
            ->get();

        $input['user_id'] = $idtoupdate;
        $input['site_id'] = 1;
        $totalminutes = ($input['appt_start_hour']*60) + $input['appt_start_minute'] + $input['duration'];
        $input['appt_end_hour'] = intval($totalminutes / 60);
        $input['appt_end_minute'] =  $totalminutes % 60;
        $input['appt_with'] = $appt_with_name[0]->name;
        $input['appt_color'] = $appt_with_name[0]->color;
        $input['start_date_time'] = $input['appt_date'] . " " . str_pad($input['appt_start_hour'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($input['appt_start_minute'], 2, '0', STR_PAD_LEFT) . ":00"; 
        $input['end_date_time'] = $input['appt_date'] . " " . str_pad($input['appt_end_hour'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($input['appt_end_minute'], 2, '0', STR_PAD_LEFT) . ":00"; 

        Appointment::create($input);

        return redirect("appointments/showbydate/" . $input['appt_date'] . "/0");
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

    public function update($id, Requests\AppointmentRequest $request) 
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        $input = Request::all();

        $appt_with_name = DB::table('users')
            ->select('name', 'color')
            ->where('users.id', '=', $input['appt_with_id']) 
            ->get();
        $input['start_date_time'] = $input['appt_date'] . " " . str_pad($input['appt_start_hour'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($input['appt_start_minute'], 2, '0', STR_PAD_LEFT) . ":00"; 
        $input['end_date_time'] = $input['appt_date'] . " " . str_pad($input['appt_end_hour'], 2, '0', STR_PAD_LEFT) . ":" . str_pad($input['appt_end_minute'], 2, '0', STR_PAD_LEFT) . ":00"; 

        DB::table('appointments')
            ->where('appt_id', $id)
            ->update(
                ['comments' => $input['comments'],
                'appt_date' => $input['appt_date'], 
                'appt_start_hour' => $input['appt_start_hour'], 
                'appt_start_minute' => $input['appt_start_minute'],
                'appt_end_hour' => $input['appt_end_hour'], 
                'appt_end_minute' => $input['appt_end_minute'],
                'start_date_time' => $input['start_date_time'],
                'end_date_time' => $input['end_date_time'],
                'appt_with' => $appt_with_name[0]->name,
                'appt_with_id' => $input['appt_with_id'],
                'sms_1hour' => $input['sms_1hour'],
                'appt_color' => $appt_with_name[0]->color,
                'sms_1day' => $input['sms_1day']
                ]);

         return redirect("appointments/showbydate/" . $input['appt_date'] . "/0");
    }

    public function previewDelete($id)
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

        return view('appointments.delete', compact('appointments'), compact('apptpeople'));
    }

    public function performDelete($id)
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        DB::table('appointments')
            ->where('appt_id', $id)->delete();

        \Session::flash('flash_message', 'Appointment has been deleted.');
        
        return redirect("appointments/viewall");
    }
}
