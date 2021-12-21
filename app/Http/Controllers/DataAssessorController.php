<?php

namespace App\Http\Controllers;

use App\Models\AssessorModel;
use App\Models\CategoryModel;

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
            $assessor = AssessorModel::all();
            $title = 'data asesor';
            return view('admin.assessor.listAssessor', compact('assessor','title'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
            $field = CategoryModel::all();
            $title= 'Data assessor';
            return view('admin.assessor.CreateAssessor', compact('field','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $category)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:assessor',
            'password' => 'required',
            'field_id' => 'required'
        ]);
       $assessors = new AssessorModel([
        'name' => $request->name,
        'email' => $request->email,
        'password'=> $request->password,
        'field_id' =>  $request->field_id,
        ]);
      
       $assessors->save();
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
            'field' => CategoryModel::all(),
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
            'password' => 'required',
            'field_id' => 'required'
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