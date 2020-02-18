<?php

namespace App\Http\Controllers;

use App\DensityAlert;
use Illuminate\Http\Request;

class DensityAlertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $densityAlerts = DensityAlert::all();
        return View::make('densityAlerts.index')->with('densityAlerts', $densityAlerts);

    }

    public function get_device_alerts( $device_id = NULL, $list = NULL )
    {
        $url = "https://api.serverdensity.io/alerts/triggered/";
        if( $list != NULL )
        {
            switch( $list )
            {
                case 'closed':
                    $list = 'closed=true&';
                    break;
                case 'open':
                    $list = 'closed=false&';
                    break;
                default:
                    $list = 'closed=false&';
                    break;

            }
        }
        if( $device_id != NULL ) {
            $url .= "{$device_id}/?subjectType=device";
            $con = "&";
        } else {
            $con = "?";
        }
        $url .= "{$con}{$list}token=aee458c5604026187341113beac51261";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_USERAGENT, "SD_PHP_API_AW/1.0");
        curl_setopt($handle, CURLOPT_HEADER, 0);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handle, CURLOPT_TIMEOUT, 10);

        $alertResponse = json_decode(curl_exec($handle), JSON_PRETTY_PRINT);
        if( curl_errno( $handle ) )
        {
            echo 'error:' . curl_error($handle);
            die();
        }
        curl_close($handle);
        //return $alertResponse;

        return view('device_alerts/get_device_alerts', compact('$alertResponse', 'alertResponse'));
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

    public function save($device_id = NULL, $list = NULL)
    {
        $url = "https://api.serverdensity.io/alerts/triggered/";
        if( $list != NULL )
        {
            switch( $list )
            {
                case 'closed':
                    $list = 'closed=true&';
                    break;
                case 'open':
                    $list = 'closed=false&';
                    break;
                default:
                    $list = 'closed=false&';
                    break;

            }
        }
        if( $device_id != NULL ) {
            $url .= "{$device_id}/?subjectType=device";
            $con = "&";
        } else {
            $con = "?";
        }
        $url .= "{$con}{$list}token=aee458c5604026187341113beac51261";

        $handle = curl_init();
        curl_setopt($handle, CURLOPT_URL, $url);
        curl_setopt($handle, CURLOPT_USERAGENT, "SD_PHP_API_AW/1.0");
        curl_setopt($handle, CURLOPT_HEADER, 0);
        curl_setopt($handle, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($handle, CURLOPT_TIMEOUT, 10);

        $alertResponse = json_decode(curl_exec($handle), true);
        if( curl_errno( $handle ) )
        {
            echo 'error:' . curl_error($handle);
            die();
        }
        curl_close($handle);
        //dd($alertResponse);


        foreach($alertResponse as $res){
            $alertModel = new DensityAlert();
            $alertModel->_ID=$res['_id'];
            $alertModel->master_response_id=$res['config']['subjectId'];
            $alertModel->device_alert=$res['config']['fullName'];
            $alertModel->open=$res['config']['open'];
            $alertModel->lastUpdated=$res['updatedAt']['sec'];

            $alertModel->save();
        }


        #$alertResponse->open=open;
        #$alertResponse->lastUpdated=$req->lastUpdated;
        #$alertResponse->_Id=$req->_ID;

        //$alertResponse->save();

        die('Success!');
    }

}
