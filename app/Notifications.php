<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    public $table = 'notifications';

    public $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany('App\User');
    }

    public function read()
    {
        return $this->hasMany('App\NotificationUser', 'notifications_id');
    }
}
