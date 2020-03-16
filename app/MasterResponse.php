<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterResponse extends Model
{
    protected $fillable = [
        'responseID', 'name', 'group', 'device_name'
    ];

    public function whoToAlerts()
    {
        return $this->hasMany('App\WhoToAlert');
    }

    public function tickets()
    {
        return $this->hasMany('App\Ticket');
    }


}
