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
        public function __construct()
    {
        date_default_timezone_set('America/New_York');
    }

    public function index()
    {
       
        date_default_timezone_set('America/New_York');
        return view('home');
    }

    public function test(Request $request, $id)
    {
        $hourPlus2 = date('Y-m-d', strtotime("+1 day", strtotime(date('Y-m-d'))));
        return $hourPlus2;
  
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
