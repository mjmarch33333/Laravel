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
        date_default_timezone_set('EST');
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
            ->where('id', '=', $id)
            ->get();

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

        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'phone_number' => $input['phone_number'],
            'admin_site_id' => 0,
            'schedule_site_id' => 0,
            'password' => bcrypt($input

                ['password']),
        ]);

        return redirect('admin/viewallusers');
    }
}
