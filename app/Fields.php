<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fields extends Model
{

    public $guarded = ['id'];
    /*
     * DB Table
     */
    public $table = 'fields';

    /*
     * Timestamps set to false not used
     */
    public $timestamps = false;

}
