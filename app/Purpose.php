<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purpose extends Model
{
    protected $fillable = ['guest_id','field_id','service_id','tujuan','kritik_saran','rating'];
    // public function purpose(){
    //     return $this->belongsToMany('App\Purpose', 'field_guest', 'guest_id', 'field_id');
    // }
    public function guests(){
        return $this->hasOne(Guest::class, 'id', 'guest_id');
    }
    public function fields(){
        return $this->hasOne(Field::class, 'id', 'field_id');
    }
    public function services(){
        return $this->hasOne(Service::class, 'id', 'service_id');
    }
}
