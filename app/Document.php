<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'Document';
    protected $primaryKey = 'id';
    protected $fillable = ['Title'];
    //protected $fillable = [‘Update_at’];
    //protected $fillable = [‘Create_at’];
    
    
    public function Document_Type() {
        return $this->belongsTo('App\Document_Type', 'Document_Type_id','id');
        }

}
