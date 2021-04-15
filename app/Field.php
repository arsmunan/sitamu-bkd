<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public function services(){
        return $this->hasMany(Service::class);
    }
    protected $fillable = ['nama'];
    // public function guests(){
    //     return $this->belongsToMany(Guest::class,'purposes');
    // }
    
}
