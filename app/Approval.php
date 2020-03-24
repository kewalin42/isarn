<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $table = 'sentence';
    protected $guarded = [];
    //
    public function sentence()
    {
        return $this->belongsTo('App\Sentence');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    // public function User() {
    //     return $this->belongsTo('App\User', 'User_id','id');
    //     }  
}
