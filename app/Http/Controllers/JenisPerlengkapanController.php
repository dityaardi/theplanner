<?php

namespace App\Http\Controllers;

use App\Models\ModelPerlengkapan;
use Illuminate\Http\Request;

class JenisPerlengkapanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pr = ModelPerlengkapan::orderby('idperlengkapan', 'ASC')->paginate(5);

        return view('superadmin.perlengkapan',[
            'perlengkapan'=>$pr
        ]);
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
        $validateData = $request->validate([
            'namaperlengkapan'        => 'required|unique:tbl_perlengkapan'
        ]);

        ModelPerlengkapan::create($validateData);
        return redirect('/jenis-perlengkapan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idperlengkapan)
    {
        $request->validate([
            'namaperlengkapan'        => 'required'
        ]);

        $idperlengkapan = ModelPerlengkapan::find($idperlengkapan);
        $idperlengkapan->namaperlengkapan = $request->namaperlengkapan;
        $idperlengkapan->save();
        
        return redirect('/jenis-perlengkapan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idperlengkapan)
    {
        $data=ModelPerlengkapan::find($idperlengkapan);
        $data->delete();

        return redirect('/jenis-perlengkapan');
    }
}
