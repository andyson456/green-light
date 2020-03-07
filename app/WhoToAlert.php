<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WhoToAlert extends Model
{
    protected $fillable = [
        'device_id', 'users', 'category', 'master_response_id'
    ];

    public function masterResponses()
    {
        return $this->belongsTo('App\MasterResponse');
    }

}
