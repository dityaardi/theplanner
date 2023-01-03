<?php

namespace App\Http\Controllers;

use App\Models\ModelJenis_Barang;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $br = ModelJenis_Barang::orderby('idjenisbarang', 'ASC')->paginate(5);

        return view('superadmin.jenbar',[
            'barang'=>$br
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
            'jenisbarang'        => 'required|unique:tbl_jenisbarang'
        ]);

        ModelJenis_Barang::create($validateData);
        return redirect('/jenis-barang');
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
    public function update(Request $request, $idjenisbarang)
    {
        $request->validate([
            'jenisbarang'        => 'required'
        ]);

        $idjenisbarang = ModelJenis_Barang::find($idjenisbarang);
        $idjenisbarang->jenisbarang = $request->jenisbarang;
        $idjenisbarang->save();
        
        return redirect('/jenis-barang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idjenisbarang)
    {
        $data=ModelJenis_Barang::find($idjenisbarang);
        $data->delete();

        return redirect('/jenis-barang');
    }
}
