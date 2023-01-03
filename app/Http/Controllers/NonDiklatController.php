<?php

namespace App\Http\Controllers;

use App\Models\ModelJenis_Program;
use App\Models\ModelNon_Diklat;
use Illuminate\Http\Request;

class NonDiklatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nd = ModelNon_Diklat::orderby('idnondiklat', 'DESC')->paginate(5);
        $jp = ModelJenis_Program::all()->where('idjenisprogram',1);

        return view('superadmin.nondiklat',[
            'nondik'=>$nd,
            'opjenprog'=>$jp
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
            'idjenisprogram'        => 'required',
            'namadiklat'        => 'required|unique:tbl_nondiklat'
        ]);

        ModelNon_Diklat::create($validateData);
        return redirect('/jen-keg-non-diklat');
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
    public function update(Request $request, $idnondiklat)
    {
        $request->validate([
            'namadiklat'        => 'required'
        ]);

        $idnondiklat = ModelNon_Diklat::find($idnondiklat);
        $idnondiklat->namadiklat = $request->namadiklat;
        $idnondiklat->save();
        
        return redirect('/jen-keg-non-diklat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idnondiklat)
    {
        $data=ModelNon_Diklat::find($idnondiklat);
        $data->delete();

        return redirect('/jen-keg-non-diklat');
    }
}
