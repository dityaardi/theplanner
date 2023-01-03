<?php

namespace App\Http\Controllers;

use App\Models\ModelModa_Pengadaan;
use Illuminate\Http\Request;

class ModaPengadaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengadaan = ModelModa_Pengadaan::orderby('idmodapengadaan', 'DESC')->paginate(5);

        return view('superadmin.modapengadaan',[
            'pengadaan' => $pengadaan
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
            'jenismodapengadaan'        => 'required|unique:tbl_modapengadaan'
        ]);

        ModelModa_Pengadaan::create($validateData);
        return redirect('/jenis-pengadaan');
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
    public function edit(Request $request, $idmodapengadaan)
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
    public function update(Request $request, $idmodapengadaan)
    {
        $request->validate([
            'jenismodapengadaan'        => 'required'
        ]);

        $idmodapengadaan = ModelModa_Pengadaan::find($idmodapengadaan);
        $idmodapengadaan->jenismodapengadaan = $request->jenismodapengadaan;
        $idmodapengadaan->save();
        
        return redirect('/jenis-pengadaan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idmodapengadaan)
    {
        $data=ModelModa_Pengadaan::find($idmodapengadaan);
        $data->delete();

        return redirect('/jenis-pengadaan');
    }
}
