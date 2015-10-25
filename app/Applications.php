<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Applications extends Model
{
    /*
    * DB Table
    */
    public $table = 'applications';

    protected $guarded = ['id'];

    /**
     * A application belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * An application has many references
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reference()
    {
        return $this->hasMany('App\References', 'applications_id', 'id');
    }
}
