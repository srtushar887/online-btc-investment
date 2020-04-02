<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_capital_withdraw extends Model
{
    public function user()
    {
        return $this->hasOne(User::class,'id','user_id');
    }
}
