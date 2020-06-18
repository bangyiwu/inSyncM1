<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leader extends Model
{
    protected $fillable = ['user_id', 'name'];
    
    public function groups(){
        return $this->belongsToMany(Group::class)->withTimestamps();
    }
}
