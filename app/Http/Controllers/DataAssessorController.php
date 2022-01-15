<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AssessorModel;
use App\Models\CategoryModel;
use App\Models\SchemaClassModel;
use App\Models\SchemaModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class DataAssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(AdminModel $admin, SchemaClassModel $class)

    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.assessor.listAssessor', [
            'class'=>$class->id,
            'assessor' => $class->assessors,
            'title' => 'asesor',
            'admin'=>$data
        ]);
      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($class)
    {
        $data = DB::table('category')->get();
        $class=$class;
        //$field = CategoryModel::all();
        $title = 'Data assessor';
        return view('admin.assessor.CreateAssessor', compact('title', 'data','class'));
    }
    public function schemaAssessor($id)
    {
        $sA = (DB::table('schema')->where('field_id', $id)->get());
        return response()->json($sA);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, SchemaClassModel $class)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:assessor',
            'password' => 'required',
        ]);
        $assessors = new AssessorModel([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'class_id' => $class->id
        ]);
        $assessors->save();
   
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
   
    public function edit(SchemaClassModel $class,AssessorModel $assessor)
    {
        $field = CategoryModel::all();
        $title = 'Data assessor';
        $class = $class;
        $assessor = $assessor;
        return view('admin.assessor.EditAssessor', compact('title','class', 'field', 'assessor', ));
    }

    public function schemaAssessors($id)
    {
        $sA = (DB::table('schema_models')->where('field_id', $id)->get());
        return response()->json($sA);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
  

    public function update(Request $request, SchemaClassModel $class,AssessorModel $assessor)
    {
        $rules=[
            'name' =>'required',
            'password' =>'required',
        ];
        if($request->email != $assessor->email){
            $rules['email'] = 'required|unique:assessor';
        }
        $validateData['class_id']=$class->id;
        $validateData= $request->validate($rules);
        $assessor->update($validateData);

        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('success', 'Data assessor berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchemaClassModel $class,AssessorModel $assessor,)
    {
        AssessorModel::destroy($assessor->id);
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('success', 'Data Assessor berhasil di hapus!');
    }
}
