<?php

namespace App\Http\Controllers;

use App\Pemenangmodel;
use App\Macara;
use App\Mpeserta;
use App\Hadiahmodel;
use Illuminate\Http\Request;

class Pemenangcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pemenang = Pemenangmodel::all();
        $acara = Macara::select('id', 'acara')->get();
        $peserta = Mpeserta::select('id', 'nama')->where('status', 1)->get();
        $hadiah = Hadiahmodel::select('id', 'nama_hadiah')->get();
        $data = array(
            'pemenang' => $pemenang,
            'acara' => $acara,
            'peserta' => $peserta,
            'hadiah' => $hadiah
        );
        return view('admin/pemenang', $data);
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
        Pemenangmodel::create($request->all());

        return redirect('/pemenang')->with('status', 'pemenang baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pemenangmodel  $pemenangmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Pemenangmodel $pemenangmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pemenangmodel  $pemenangmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemenangmodel $pemenangmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pemenangmodel  $pemenangmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemenangmodel $pemenangmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pemenangmodel  $pemenangmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemenangmodel $pemenangmodel)
    {
        Pemenangmodel::destroy('id', $pemenangmodel->id);

        return redirect('/pemenang')->with('status', '1 data pemenang berhasil dihapus');
    }
}
