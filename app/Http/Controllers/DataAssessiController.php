<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;

use Illuminate\Http\Request;

class DataAssessiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.assessi.listAssessi', [
            'assessi' => AssessiModel::all(),
            'title'=> 'Data Assessi'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assessi.CreateAssessi',[
            'title'=> 'Data Assessi'
        ]);
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'schema_code' => 'required'
        ]);
        AssessiModel::create($validateData);

        return redirect('/dataAssessi')->with('success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessiModel $assessi)
    {
        return view('admin.assessi.EditAssessi', [
            'assessi' => $assessi,
            'title' => 'Data Assessi'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssessiModel $assessi)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'schema_code' => 'required'
        ]);
        AssessiModel::where('id', $assessi->id)
                ->update($validateData);

        return redirect('/dataAssessi')->with('success', 'Data Assessi berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessiModel $assessi)
    {
        AssessiModel::destroy($assessi->id);
        return redirect('/dataAssessi')->with('success', 'Data Assessi berhasil di hapus!');
    }
}