<?php

namespace App\Http\Controllers;

use App\Models\ModelJenis_Program;
use Illuminate\Http\Request;

class JenisProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jp = ModelJenis_Program::orderby('idjenisprogram', 'ASC')->paginate(5);

        return view('superadmin.jenprog',[
            'jenprog'=>$jp
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
            'jenisprogram'        => 'required|unique:tbl_jenisprogram'
        ]);

        ModelJenis_Program::create($validateData);
        return redirect('/jenis-program');
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
    public function update(Request $request, $idjenisprogram)
    {
        $request->validate([
            'jenisprogram'        => 'required'
        ]);

        $idjenisprogram = ModelJenis_Program::find($idjenisprogram);
        $idjenisprogram->jenisprogram = $request->jenisprogram;
        $idjenisprogram->save();
        
        return redirect('/jenis-program');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idjenisprogram)
    {
        $data=ModelJenis_Program::find($idjenisprogram);
        $data->delete();

        return redirect('/jenis-program');
    }
}
