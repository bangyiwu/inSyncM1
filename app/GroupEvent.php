<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroupEvent extends Model
{
    use SoftDeletes; 
    protected $fillable=['title', 'start', 'end', 'color', 'description', 'user_id', 'location','group_id'];

    public function group() {
        return $this->belongsTo('App\Group','group_id');
    }

}
