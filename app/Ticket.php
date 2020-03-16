<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'master_response_id', 'tech', 'ticket', 'note', 'category', 'active'
    ];

    public function masterResponses()
    {
        return $this->belongsTo('App\MasterResponse');
    }

}
