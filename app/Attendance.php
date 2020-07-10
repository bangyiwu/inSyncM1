<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable=['user_id', 'groupEvent_id', 'group_id', 'attend','reason','name'];
    public $timestamps = false;

}
