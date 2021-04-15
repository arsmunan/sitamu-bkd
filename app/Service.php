<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function fields(){
        return $this->belongsTo(Field::class,'field_id');
    }
    protected $fillable = ['nama','jenis_layanan'];

}
