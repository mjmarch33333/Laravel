<?php

namespace App\Http\Controllers;

use Request;
use App\Appointment;
use App\User;
use DB;
use App\Quotation;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
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
        //
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

    public function setupSimpleSMS()
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        return view('admin.sendSimpleSMS');   
    }
    public function sendSimpleSMS()
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $input = Request::all();
        $phone_number = $input['phone_number'];
        $message = $input['message'];
        $message = str_replace(' ', '%20', $message);
        $url='http://sms2.cdyne.com/sms.svc/SimpleSMSsend?PhoneNumber=(' . $phone_number . ')&Message=' . $message . '&LicenseKey=(CA15470E-7E96-4F6A-B285-94284AA68B59)';
 
        $cURL = curl_init();
 
        curl_setopt($cURL,CURLOPT_URL,$url);
        curl_setopt($cURL,CURLOPT_HTTPGET,true);
        curl_setopt($cURL, CURLOPT_HTTPHEADER, array('Content-Type: application/json','Accept: application/json'));
 
        $result = curl_exec($cURL);
 
        curl_close($cURL);

        // View the response from CDYNE
        return $result;
    }

    public function test()
    {
        return phpinfo();
    }

    public function viewUser($id)
    {
        $admin = \Auth::user()->admin_site_id;
        $myid = \Auth::user()->id;
        if ($admin < 1 && $myid <> $id)
        {
             return redirect('home');
        }

        // I had to add use DB; and use App\Quotation; above to get below query to work
        $users = DB::table('users')
            ->where('id', '=', $id)->orderBy('last_name')->get();

        return view('admin.viewuser', compact('users'));   
    }

    public function viewAllUsers()
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }

        // I had to add use DB; and use App\Quotation; above to get below query to work
        $users = DB::table('users')->get();

        return view('admin.viewallusers', compact('users'));
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
        $admin = \Auth::user()->admin_site_id;
        $myid = \Auth::user()->id;
        if ($admin < 1 && $myid <> $id)
        {
             return redirect('home');
        }

        $input = Request::all();

        if ($admin < 1)
        {
        DB::table('users')
            ->where('id', $id)
            ->update(
                ['email' => $input['email'],
                'phone_number' => $input['phone_number']
                ]);
        }
        else
        {
            DB::table('users')
                ->where('id', $id)
                ->update(
                    ['email' => $input['email'],
                    'phone_number' => $input['phone_number'], 
                    'date_of_birth' => $input['date_of_birth'],
                    'admin_site_id' => $input['admin_site_id'], 
                    'schedule_site_id' => $input['schedule_site_id'],
                    'color' => $input['color']
                    ]);
        }

        return redirect('admin/viewallusers');
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

    public function formNewUser()
    {
        return view('admin.register');
    }

    public function createNewUser()
    {
        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return redirect('home');
        }
        $input = Request::all();
        $input['name'] = $input['first_name'] . " " . $input['middle_name'] . " " . $input['last_name'];
        User::create([
            'first_name' => $input['first_name'],
            'last_name' => $input['last_name'],
            'middle_name' => $input['middle_name'],
            'name' => $input['name'],
            'date_of_birth' => $input['date_of_birth'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'admin_site_id' => 0,
            'schedule_site_id' => 0,
            'password' => bcrypt($input['password']),
        ]);

        return redirect('admin/viewallusers');
    }
}
