<?php

namespace App\Http\Controllers;

use App\Macara;
use Illuminate\Http\Request;

class Acaracontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acara = Macara::all();
        $data = array(
            'acara' => $acara
        );
        return view('admin/acara', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $nama_file = $request->file('foto')->getClientOriginalName();
        }

        Macara::create([
            'acara' => $request->acara,
            'deskripsi' => $request->deskripsi,
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
            'waktu' => $request->waktu,
            'jml_peserta' => $request->jml_peserta,
            'keterangan' => $request->keterangan,
            'foto' => $nama_file
        ]);
        return redirect('/acara')->with('status', 'Acara berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Macara  $macara
     * @return \Illuminate\Http\Response
     */
    public function show(Macara $macara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Macara  $macara
     * @return \Illuminate\Http\Response
     */
    public function edit(Macara $macara)
    {
        return view('admin/edit_acara', ['data' => $macara]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Macara  $macara
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Macara $macara)
    {
        if($request->hasFile('foto')){
            $request->file('foto')->move('foto/', $request->file('foto')->getClientOriginalName());
            $nama_file = $request->file('foto')->getClientOriginalName();
            Macara::where('id', $macara->id)->update([
                'acara' => $request->acara,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'waktu' => $request->waktu,
                'jml_peserta' => $request->jml_peserta,
                'keterangan' => $request->keterangan,
                'foto' => $nama_file
            ]);
        }else{
            Macara::where('id', $macara->id)->update([
                'acara' => $request->acara,
                'deskripsi' => $request->deskripsi,
                'tanggal' => $request->tanggal,
                'tempat' => $request->tempat,
                'waktu' => $request->waktu,
                'jml_peserta' => $request->jml_peserta,
                'keterangan' => $request->keterangan
            ]);
        }
        
        return redirect('/acara')->with('status', 'Acara berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Macara  $macara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Macara $macara)
    {
        Macara::destroy('id', $macara->id);
        
        return redirect('/acara')->with('status', 'Acara berhasil dihapus');
    }
}
