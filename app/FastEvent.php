<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FastEvent extends Model
{
    use SoftDeletes; 
    protected $fillable=['title', 'start', 'end', 'color', 'description', 'user_id', 'location'];

    public function group() {
        return $this->belongsTo('App\User','user_id');
    }

}
