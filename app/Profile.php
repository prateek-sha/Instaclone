<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    //
    protected $guarded = [];

    public function profileimage(){
        $imagepath = ($this->image) ? $this->image : 'profiles/RI9efmrzVtW0CxCBZfIpYCAxiLnnFO9U41747LmI.jpeg';
        return '/storage/'.$imagepath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
