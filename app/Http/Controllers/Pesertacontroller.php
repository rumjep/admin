<?php

namespace App\Http\Controllers;

use App\Mpeserta;
use Illuminate\Http\Request;

use App\Mail\Verifikasiemail;
use Illuminate\Support\Facades\Mail;

class Pesertacontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peserta = Mpeserta::all();

        return view('admin/semua_peserta', ['peserta' => $peserta]);
    }

    public function verif(Mpeserta $mpeserta){
        Mpeserta::where('id', $mpeserta->id)->update([
            'status' => 1
        ]);

        $data = array(
            'nama' => $mpeserta->nama,
            'event' => $mpeserta->acara->acara
        );

        Mail::to($mpeserta->email)->send(new Verifikasiemail($data));

        return redirect('/peserta')->with('status', 'Peserta sudah diverifikasi');
    }

    public function unverif(Mpeserta $mpeserta){
        Mpeserta::where('id', $mpeserta->id)->update([
            'status' => 0
        ]);

        return redirect('/peserta')->with('status', 'Peserta berhasil diunverifikasi');
    }

    public function destroy(Mpeserta $mpeserta){
        Mpeserta::destroy('id', $mpeserta->id);

        return redirect('/peserta')->with('status', 'Data peserta berhasil dihapus');
    }
}
