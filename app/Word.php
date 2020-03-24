<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    protected $table = 'Word';
    protected $primaryKey = ‘id’;
    protected $guarded = [];
    //protected $fillable = [‘Word’];
    //protected $fillable = [‘Update_at’];
    //protected $fillable = [‘Create_at’];
    //protected $fillable = [‘Order’];
    //protected $fillable = [‘Type’];
}
