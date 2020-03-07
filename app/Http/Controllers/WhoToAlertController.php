<?php

namespace App\Http\Controllers;

use App\MasterResponse;
use App\WhoToAlert;
use Illuminate\Http\Request;

class WhoToAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index($id)
    {
        $userDevices = MasterResponse::find($id)->whoToAlerts;
        return view("who_to_alert/index")->with('userDevices', $userDevices)->with('responseID', $id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view("who_to_alert/create")->with('id', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $whoToAlert = new WhoToAlert();
        $whoToAlert->master_response_id = $request->input('idhidden');
        $whoToAlert->device_id = $request->input('device_id');
        $whoToAlert->users = $request->input('users');
        $whoToAlert->category = $request->input('category');
        $whoToAlert->save();

        return redirect("who_to_alert/{$whoToAlert->master_response_id}/index")->with('success', 'Successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$userDevices = MasterResponse::find($id)->whoToAlerts;
        //return view('who_to_alert/show')->with('userDevices', $userDevices);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //$userDevices = MasterResponse::find($id)->whoToAlerts;
        $userDevices = WhoToAlert::find($id);
        return view('who_to_alert/edit')->with('userDevices', $userDevices)->with('id', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userDevices = WhoToAlert::find($id);
        $masterResponseId = $userDevices->master_response_id;
        $userDevices->device_id = $request->input('device_id');
        $userDevices->users = $request->input('users');
        $userDevices->category = $request->input('category');

        $userDevices->save();

        return redirect("who_to_alert/$masterResponseId/index")->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userDevices = WhoToAlert::find($id);
        $userDevices->delete();

        Session::flash('message', 'Successfully delete user device information');
        return redirect('who_to_alert/');
    }
}
