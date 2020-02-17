<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DensityAlert extends Model
{
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

        $response = json_decode(curl_exec($handle));
        if( curl_errno( $handle ) )
        {
            echo 'error:' . curl_error($handle);
            die();
        }
        curl_close($handle);
        return $response;
    }
}
