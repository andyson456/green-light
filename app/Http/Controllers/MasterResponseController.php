<?php

namespace App\Http\Controllers;

use App\MasterResponse;
use GuzzleHttp\Client;
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
        //
    }

    public function get_master_response()
    {
        //return MasterResponse::all();
        $masterResponses = MasterResponse::all();
        return view('master_responses/get_master_responses')->with('masterResponses', $masterResponses);
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
     * @param MasterResponse $masterResponse
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $masterResponse = MasterResponse::find($id);
        return view('master_responses/edit')->with('masterResponse', $masterResponse);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $masterResponse = MasterResponse::find($id);
        $masterResponse->device_name = $request->input('device_name');

        $masterResponse->save();

        return redirect('master_responses/get_master_responses')->with('success', 'Device name updated');

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

    public function gitlabCallback(Request $request)
    {
        $query = $request->get("code");

        $client = new Client([
            'timeout'  => 2.0,
        ]);

        $handler = $client->post("http://gitlab.getfoundeugene.com/oauth/token?client_id=c68b38e2c326e748875783ba53dc64c4a366f48660dd94778d738591f159f25a&client_secret=188d39ac532b75e71a88eb54540fe26251e7f0b71793a37331da94e75067e289&code=".$request->query('code')."&grant_type=authorization_code&redirect_uri=https://tolocalhost.com/gitlab/callback");


        return view('authRedirect')->with('gitlabResponseBody', $handler->getBody());
    }

}
