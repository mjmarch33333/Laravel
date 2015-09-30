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

    public function testbare() {
        return view('bare');
    }

    public function pushnotify()
    {/*
        $url = 'https://api.parse.com/1/push';

        $appId = 'aTBQ8kvmvSCruKSlQz4bBHgQrbNM3d2eTX9vq9uJ';
        $restKey = 'IMXZ6Q2pcxTepXUWYfA318Jr3c2stg6uMeAdtubx';

        $target_device = '';  // using object Id of target Installation.

        $push_payload = json_encode(array(
            "where" => array(
                    "objectId" => $target_device,
                   ),
            "data" => array(
                    "alert" => "This is the from homestead."
            )
        ));

        $rest = curl_init();
        curl_setopt($rest,CURLOPT_URL,$url);
        curl_setopt($rest,CURLOPT_PORT,443);
        curl_setopt($rest,CURLOPT_POST,1);
        curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);
        curl_setopt($rest,CURLOPT_HTTPHEADER,
        array("X-Parse-Application-Id: " . $appId,
                "X-Parse-REST-API-Key: " . $restKey,
                "Content-Type: application/json"));

        $response = curl_exec($rest);
        echo $response;
*/        
        $url = 'https://gcm-http.googleapis.com/gcm/send';

        //$appId = 'AIzaSyDNSkIhP_L_0j6X4yNiJaJJKPduAz6H7mU';
        $appId = "AIzaSyCsP0g5eT8-FHGWb8fWfQyNALURHJO1G2Q";
        //$device_token="ekV4K55W4wg:APA91bF_MQzi73GipT5Gvh8ngwvqihEfY4CwoL_uoqI4W7jwUfkTh6HSF2V85kXNaF_x36G7-RgUxJMGf_J52qVnPfiqxc91Z2IgC6Tj1HyRZ5YeCvW1IzTrcMGhocccyldsrD7YzMZC";
        //$device_token="d44YB9X1G4g:APA91bH6rBmMmEE5vcccKg5d3EYJNz0rs8fN6vi3ZDBz6saFqBMXtiNxF9Cdx05wDQ7TEHP5M2rOwOolk84XBRo6rTgVmiZijK5noGnHOPh6pyy54kBnbv0UWprKTpt9VcP0XP0HSTMd";
        $device_token="dtAUirYeZxg:APA91bEuVNrZTSkVsVDZ7QGHC9ol3d4SFrCK1m2x6WGYmzqnRm0Z5Vxl3c4i_9DXoi0gGGGz3bRaS0agT18IotJ1X4ZtjrbmRPWvkluwryWoL3foGh75Rfu3sJGKxZRZvMHBFnaEfIwn";
        $push_payload = json_encode(array(
            "data" => array(
                    "message" => "testing intent from mike",
                   ),
            "to" => $device_token
            ));

        $rest = curl_init();
        curl_setopt($rest,CURLOPT_URL,$url);
        curl_setopt($rest,CURLOPT_PORT,443);
        curl_setopt($rest,CURLOPT_POST,1);
        curl_setopt($rest,CURLOPT_POSTFIELDS,$push_payload);
        curl_setopt($rest,CURLOPT_HTTPHEADER,
        array("Authorization:key=" . $appId,
                "Content-Type: application/json"));

        $response = curl_exec($rest);
        echo $response;
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
