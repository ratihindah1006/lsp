<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AssessorModel;
use App\Models\DataAssessiModel;
use App\Models\SchemaClassModel;
use App\Models\DataAssessorModel;
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
        $class_id=$class->id;
        $classId = $class->event->schema_class->pluck("id");
        $assessor = DataAssessorModel::whereDoesntHave('assessors', function ($query) use ($classId) {
            return $query->whereIn('class_id', $classId);
        })->get();
        $count=AssessorModel::where('class_id',$class_id)->count();
        return view('admin.assessor.ListAssessor', [
            'class'=>$class->id,
            'assessor' => $assessor,
            'assessors' => $class->assessors,
            'title' => 'asesor',
            'admin'=>$data,
            'count'=>$count,
        ]);
      
    }

    public function store(Request $request, SchemaClassModel $class)
    {

        $request->validate([
            'data_assessor_id' => 'required',
        ]);
        $assessors = new AssessorModel([
            'data_assessor_id' => $request->data_assessor_id,
            'class_id' => $class->id
        ]);
        $assessors->save();
   
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('toast_success', 'Data Asesor berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
   
    public function edit(SchemaClassModel $class, AssessorModel $assessor)
    {
        return view('admin.assessor.EditAssessor', [
            'title' => 'Data assessor',
            'class' => $class,
            'assessors' => $assessor,
            'data_assessor' => DataAssessorModel::all(),
        ]);
    }

 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessorModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
  

    public function update(Request $request, SchemaClassModel $class, AssessorModel $assessor)
    {
        $rules=[
            'data_assessor_id' => 'required',
        ];
        
        $validateData['data_assessor_id']=$request->data_assessor_id;
        $validateData['class_id']=$class->id;
        $validateData= $request->validate($rules);
        $assessor->update($validateData);

        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('toast_success', 'Data assessor berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchemaClassModel $class, AssessorModel $assessor)
    {
        AssessorModel::destroy($assessor->id);
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesor')->with('toast_success', 'Data Assessor berhasil di hapus!');
    }
    //.
    //.
    //DATA ASESOR KESELURUHAN

    //index
    public function index_data_assessor(AdminModel $admin)
    {
        $data = $admin->where('id', Auth::user()->id)->get();
        return view('admin.data_assessor.ListDataAssessor', [
            'data_assessor' => DataAssessorModel::all(),
            'title' => 'asesor',
            'admin' => $data
        ]);
    }

    //create
    public function create_data_assessor()
    {
        return view('admin.data_assessor.CreateDataAssessor',[
            'title' => 'Data Assessor'
        ]);
    }

    //store
    public function store_data_assessor(Request $request)
    {
  
        $rules=[
            'name' => 'required',
            'email' => 'required|unique:data_assessor|email',
            'no_met' => 'required|unique:data_assessor',
            'assessor_signature' => 'required|file|image|mimes:png,jpg,jpeg|max:1024'
        ];
        $validateData=$request->validate($rules);
       
        $validateData['assessor_signature']=$request->file('assessor_signature')->store('assessor_signature');
        
        DataAssessorModel::create($validateData);
        
        return redirect('/dataAssessor')->with('toast_success', 'Data Asesi berhasil di tambahkan!');
    }

    //edit
    public function edit_data_assessor(DataAssessorModel $data_assessor)
    {
       
        return view('admin.data_assessor.EditDataAssessor',[
            'title' => 'Data assessor',
            'data_assessor' => $data_assessor,
        ]);
    }

    //update
    public function update_data_assessor(Request $request, DataAssessorModel $data_assessor)
    {
        $rules = [
            'name' => 'required',
            'assessor_signature'=> 'file|image|mimes:jpeg,png,jpg|max:1024',
        ];
        if ($request->email != $data_assessor->email) {
            $rules['email'] = 'required|unique:data_assessor|email';
        }
        if ($request->no_met != $data_assessor->no_met) {
            $rules['no_met'] = 'required|unique:data_assessor';
        }
        $validateData = $request->validate($rules);
        if ($request->hasFile('assessor_signature')) {
            $validateData['assessor_signature']=$request->file('assessor_signature')->store('assessor_signature');
        }
        
        $data_assessor->update($validateData);

        return redirect('/dataAssessor')->with('toast_success', 'Data assessor berhasil di Update!');
    }
    //destroy
    public function destroy_data_assessor(DataAssessorModel $data_assessor)
    {
        DataAssessorModel::destroy($data_assessor->id);
        return redirect('/dataAssessor')->with('toast_success', 'Data Assessor berhasil di hapus!');
    }
}
