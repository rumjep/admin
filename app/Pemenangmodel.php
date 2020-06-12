<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemenangmodel extends Model
{
    protected $table = 'pemenang';
    protected $fillable = ['id_acara', 'id_peserta', 'id_hadiah'];
    protected $primaryKey = 'id';

    public function acara(){
    	return $this->belongsTo('App\Macara', 'id_acara', 'id');
    }
    public function peserta(){
    	return $this->belongsTo('App\Mpeserta', 'id_peserta', 'id');
    }
    public function hadiah(){
    	return $this->belongsTo('App\Hadiahmodel', 'id_hadiah', 'id');
    }
}
