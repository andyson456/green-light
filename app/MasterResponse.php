<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterResponse extends Model
{
    public function get_master_response()
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

        curl_close($handle);
    }
}
