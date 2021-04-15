<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = ['nik','nama','organization_id','no_hp'];
    public function purposes(){
        return $this->hasOne(Purpose::class, 'guest_id');
    }
    public function organizations(){
        return $this->hasOne(Organization::class, 'organization_id');
    }

}
