<?php

namespace App\Http\Controllers;

use App\Models\AssessorModel;

use Illuminate\Http\Request;

class DataAssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.assessor.listAssessor', [
            'assessor' => AssessorModel::all(),
            'title'=> 'Data assessor'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.assessor.CreateAssessor',[
            'title'=> 'Data assessor'
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
            'password' => 'required'
        ]);
        AssessorModel::create($validateData);

        return redirect('/dataAssessor')->with('success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(AssessorModel $assessor)
    {
        return view('admin.assessor.EditAssessor', [
            'assessor' => $assessor,
            'title' => 'Data assessor'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AssessorModel $assessor)
    {
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        AssessorModel::where('id', $assessor->id)
                ->update($validateData);

        return redirect('/dataAssessor')->with('success', 'Data assessor berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(AssessorModel $assessor)
    {
        AssessorModel::destroy($assessor->id);
        return redirect('/dataAssessor')->with('success', 'Data Assessor berhasil di hapus!');
    }
}