<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Macara;
use App\Mpeserta;
use App\User;

class DashboardController extends Controller
{
    public function index(){
    	$acara = Macara::all();
    	$peserta = Mpeserta::all();
        $admin = User::all();

    	$tacara = $acara->count();
    	$tpeserta = $peserta->count();
        $tadmin = $admin->count();

    	$data = array(
    		'acara' => $tacara,
    		'peserta' => $tpeserta,
            'admin' => $tadmin
    	);
    	return view('admin/dashboard', $data);
    }
}
