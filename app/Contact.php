<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    
     protected $fillable=[
    	'user_id',
    	'contact_name',
    	'contact_num',
        'contact_email',

    ];

   
   // protected $table = 'users';
   

     public function user(){
        return $this->belongsTo('App\user');
    }

     public function users(){
        return $this->belongsToMany('App\User');
    }

}
