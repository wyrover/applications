<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenceFields extends Model
{

    /**
     * Guarded properties
     *
     * @var array
     */
    protected $guarded = ['id'];

    /**
     * Table Name
     *
     * @var string
     */
    public $table = 'reference_fields';

//    public function settings()
//    {
//        return $this->belongsTo('App\Settings');
//    }




}
