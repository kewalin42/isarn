<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence_Type extends Model
{
    // public $table = "Sentence_Types";
    //
    protected $table = 'Sentence_Types';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];

    
}
