<?php

namespace App\Http\Controllers;

use App\Pemenangmodel;
use Illuminate\Http\Request;

class Datapemenang extends Controller
{
    public function index(){
        $id_acara = request()->segment(3);
        $pemenang = Pemenangmodel::where('id_acara', $id_acara)->get();
        $data = array(
            'pemenang' => $pemenang
        );

        return view('utama/pemenang', $data);
    }
}
