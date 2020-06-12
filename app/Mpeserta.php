<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mpeserta extends Model
{
    protected $table = 'peserta';
    protected $fillable = ['id_acara', 'nama', 'j_kel', 'tgl_lahir', 'email', 'no_hp', 'status'];
    protected $primaryKey = 'id';

    public function acara(){
    	return $this->belongsTo('App\Macara', 'id_acara', 'id');
    }

    public function tgl()
    {
    	\Carbon\Carbon::setLocale('id');
    	return \Carbon\Carbon::parse($this->attributes['created_at'])
    	->format('d M Y');
    }
}
