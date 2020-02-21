<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MasterResponse extends Model
{
    protected $fillable = [
        'responseID', 'name', 'group', 'device_name'
    ];
}
