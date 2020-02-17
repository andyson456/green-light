<?php

namespace App\Http\Controllers;

use App\MasterResponse;
use Illuminate\Http\Request;

class MasterResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $masterResponses = MasterResponse::all();
        return View::make('masterResponses.index')->with('masterResponses', $masterResponses);

    }

    public function addDevice()
    {
        return view('addDevice');
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function save()
    {
        #$url = 'https://andrew.bartel:Deus3387@api.serverdensity.com/1.4/devices/list?account=deusmachine.serverdensity.com';
        $url = 'https://api.serverdensity.io/inventory/devices?token=aee458c5604026187341113beac51261';
        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_USERAGENT, "SD_PHP_API_AW/1.0");
        curl_setopt($handle, CURLOPT_HEADER, 0);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handle, CURLOPT_TIMEOUT, 10);

        $response = json_decode(curl_exec($handle), true);
        if( curl_errno( $handle ) )
        {
            echo 'error:' . curl_error($handle);
            die();
        }
        //return $response;

        curl_close($handle);

        foreach($response as $res){
            $masterResponse = new MasterResponse();
            $masterResponse->responseID=$res['_id'];
            $masterResponse->name=$res['name'];
            $masterResponse->group=$res['group'];

            $masterResponse->save();
        }

        die('Success!');
    }

}
