<?php
namespace App\Http\Controllers;

use App\Mpeserta;
use Illuminate\Http\Request;

class Pesertaverif extends Controller
{
    public function index(){
    	$peserta = Mpeserta::where('status', 1)->get();

        return view('admin/peserta_verif', ['peserta' => $peserta]);
    }
}
