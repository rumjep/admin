<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Macara extends Model
{
    protected $table = 'acara';
    protected $fillable = ['acara', 'deskripsi', 'tanggal', 'tempat', 'waktu', 'jml_peserta', 'keterangan', 'foto'];
}
