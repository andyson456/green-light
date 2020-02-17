<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function get_master_response(){

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

        return view('get_master_responses',compact('$response', 'response'));
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

        return view('get_device_alerts', compact('$alertResponse', 'alertResponse'));
    }
}
