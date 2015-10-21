<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model
{
    public $timestamps = false;

    public $table = 'settings';

    protected $guarded = ['id'];

    public function fields()
    {
        return $this->hasMany('App\ReferenceFields', 'id', 'fields_id');
    }
}
