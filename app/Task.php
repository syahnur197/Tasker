<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];
    
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function start()
    {
        return $this->update([
            "status" => 2
        ]);
    }

    public function stop()
    {
        return $this->update([
            "status" => 3,
            "completed_on" => date('Y-m-d')
        ]);
    }
}
