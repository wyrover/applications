<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificationUser extends Model
{
    public $table = 'notification_user';

    public $guarded = ['id'];

//    public function notifications()
//    {
//        return $this->belongsToMany('App\Notifications');
//    }
}
