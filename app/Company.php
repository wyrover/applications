<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /*
     * DB Table
     */
    public $table = 'companies';

    /*
     * Timestamps set to false not used
     */
    public $timestamps = false;

    /**
     * A company has many users
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany('App\User');
    }

}
