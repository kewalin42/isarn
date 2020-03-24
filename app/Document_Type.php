<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document_Type extends Model
{
    
    protected $table = 'Document_Type';
    protected $primaryKey = 'id';
    protected $fillable = ['name'];
    //protected $fillable = [‘Update_at’];
    //protected $fillable = [‘Create_at’];
}
