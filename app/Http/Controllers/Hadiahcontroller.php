<?php

namespace App\Http\Controllers;

use App\Hadiahmodel;
use Illuminate\Http\Request;

class Hadiahcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hadiah = Hadiahmodel::all();
        $data = array(
            'hadiah' => $hadiah
        );
        return view('admin/hadiah', $data);
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
        Hadiahmodel::create($request->all());

        return redirect('/hadiah')->with('status', 'Hadiah baru berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hadiahmodel  $hadiahmodel
     * @return \Illuminate\Http\Response
     */
    public function show(Hadiahmodel $hadiahmodel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hadiahmodel  $hadiahmodel
     * @return \Illuminate\Http\Response
     */
    public function edit(Hadiahmodel $hadiahmodel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hadiahmodel  $hadiahmodel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hadiahmodel $hadiahmodel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hadiahmodel  $hadiahmodel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hadiahmodel $hadiahmodel)
    {
        Hadiahmodel::destroy('id', $hadiahmodel->id);

        return redirect('/hadiah')->with('status', 'Data hadiah berhasil dihapus');
    }
}
