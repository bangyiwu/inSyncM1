<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = ['name'];
    
    public function users() {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function groupevents()
    {
        return $this->hasMany('App\GroupEvent', 'group_id', 'id');
    }
}
