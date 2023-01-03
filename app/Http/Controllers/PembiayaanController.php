<?php

namespace App\Http\Controllers;

use App\Models\ModelPembiayaan;
use Illuminate\Http\Request;

class PembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $by = ModelPembiayaan::orderby('idpembiayaan', 'ASC')->paginate(5);

        return view('superadmin.pembiayaan',[
            'biaya'=>$by
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
            'jenispembiayaan'        => 'required|unique:tbl_pembiayaan'
        ]);

        ModelPembiayaan::create($validateData);
        return redirect('/jenis-pembiayaan');
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
    public function update(Request $request, $idpembiayaan)
    {
        $request->validate([
            'jenispembiayaan'        => 'required'
        ]);

        $idpembiayaan = ModelPembiayaan::find($idpembiayaan);
        $idpembiayaan->jenispembiayaan = $request->jenispembiayaan;
        $idpembiayaan->save();
        
        return redirect('/jenis-pembiayaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idpembiayaan)
    {
        $data=ModelPembiayaan::find($idpembiayaan);
        $data->delete();

        return redirect('/jenis-pembiayaan');
    }
}
