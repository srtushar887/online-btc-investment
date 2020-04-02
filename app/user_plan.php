<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_plan extends Model
{
    public function plan()
    {
        return $this->hasOne(plan::class,'id','plan_id');
    }
}
