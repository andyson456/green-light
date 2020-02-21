<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DensityAlert extends Model
{
    protected $fillable = [
        '_id', 'master_response_id', 'device_alert', 'open', 'lastUpdated'
    ];
}
