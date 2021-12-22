<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use App\Models\AssessorModel;
use App\Models\CategoryModel;

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
        $assessi = AssessiModel::all();
        $title = 'data asesi';
        return view('admin.assessi.listAssessi', compact('assessi','title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $field = CategoryModel::all();
        $assessor = AssessorModel::all();
        $title= 'Data asesi';
        return view('admin.assessi.CreateAssessi', compact('field', 'assessor', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:assessi',
            'password' => 'required',
            'field_id' => 'required',
            'assessor_id' => 'required'
        ]);
       $assessis = new AssessiModel([
        'name' => $request->name,
        'email' => $request->email,
        'password'=> $request->password,
        'field_id' =>  $request->field_id,
        'assessor_id' =>  $request->assessor_id,
        ]);
      
       $assessis->save();
        return redirect('/dataAssessi')->with('success', 'Data Asesor berhasil di tambahkan!');
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
            'field' => CategoryModel::all(),
            'assessor' => AssessorModel::all(),
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
            'field_id' => 'required',
            'assessor_id' => 'required'
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