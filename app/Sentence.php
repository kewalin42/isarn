<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sentence extends Model
{
    //
    protected $table = 'Sentence';
    protected $primaryKey = ‘id’;
    protected $guarded = [];
   // protected $fillable = [‘Update_at’];
   // protected $fillable = [‘Create_at’];

   public function Sentence_Type() {
    return $this->belongsTo('App\Sentence_Type', 'Sentence_Type_id','id');
    // return $this->belongsTo('App\Document', 'Document_id','id');
    // return $this->belongsTo('App\users', 'users_id','id');
   

    }
    
}
