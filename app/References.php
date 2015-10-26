<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class References extends Model
{
    /*
    * DB Table
    */
    public $table = 'references';

    protected $guarded = ['id'];

    /**
     * A reference belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * A reference belongs to a company
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function company()
    {
        return $this->belongsTo('App\Company');
    }

    /**
     * A reference belongs to an application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function application()
    {
        return $this->hasOne('App\Applications', 'applications_id', 'id');
    }
}
