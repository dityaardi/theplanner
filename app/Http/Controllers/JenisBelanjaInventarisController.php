<?php

namespace App\Http\Controllers;

use App\Models\ModelBarang_Inventaris;
use Illuminate\Http\Request;

class JenisBelanjaInventarisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bl = ModelBarang_Inventaris::orderby('idjenisbelanjainventaris', 'DESC')->paginate(5);

        return view('superadmin.belanja_inventaris',[
            'belanja'=>$bl
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
            'namajenisbelanjainventaris'        => 'required|unique:tbl_jenisbelanjainventaris'
        ]);

        ModelBarang_Inventaris::create($validateData);
        return redirect('/jenis-belanja-inventaris');
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
    public function update(Request $request, $idjenisbelanjainventaris)
    {
        $request->validate([
            'namajenisbelanjainventaris'        => 'required'
        ]);

        $idjenisbelanjainventaris = ModelBarang_Inventaris::find($idjenisbelanjainventaris);
        $idjenisbelanjainventaris->namajenisbelanjainventaris = $request->namajenisbelanjainventaris;
        $idjenisbelanjainventaris->save();
        
        return redirect('/jenis-belanja-inventaris');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idjenisbelanjainventaris)
    {
        $data=ModelBarang_Inventaris::find($idjenisbelanjainventaris);
        $data->delete();

        return redirect('/jenis-belanja-inventaris');
    }
}
