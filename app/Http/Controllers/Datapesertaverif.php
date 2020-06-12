<?php

namespace App\Http\Controllers;

use App\Mpeserta;
use Illuminate\Http\Request;

class Datapesertaverif extends Controller
{
    public function index(){
        $id_acara = request()->segment(3);
        $peserta = Mpeserta::where('id_acara', $id_acara)->where('status', 1)->get();

        $data = array(
            'peserta' => $peserta
        );

        return view('utama/peserta', $data);
    }
}
