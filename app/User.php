<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use App\Task;

class User extends Authenticatable
{
    use HasRoles;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'username',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function tasks()
    {
        return $this->hasMany('App\Task', 'owner_id');
    }

    public function addTask($task)
    {
        return Task::create($task + ["owner_id" => $this->id]);
    }

    public function pendingTasks()
    {
        return $this->hasMany('App\Task', 'owner_id')->where('status', 1);
    }

    public function inProcessTasks()
    {
        return $this->hasMany('App\Task', 'owner_id')->where('status', 2);
    }

    public function completedTodayTasks()
    {
        return $this->hasMany('App\Task', 'owner_id')->where('status', 3)->where('completed_on', date("Y-m-d"));
    }

    public function completedTasks()
    {
        return $this->hasMany('App\Task', 'owner_id')->where('status', 3)->latest('completed_on');
    }

}
