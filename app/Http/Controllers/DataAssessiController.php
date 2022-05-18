<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AssessiModel;
use App\Models\DataAssessiModel;
use App\Models\SchemaClassModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class DataAssessiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminModel $admin, SchemaClassModel $class)
    {
        
        $data = $admin->where('id', Auth::user()->id)->get();
        return view('admin.assessi.ListAssessi', [
            'class' => $class->id,
            'assessi' => $class->assessis,
            'title' => 'asesi',
            'admin' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SchemaClassModel $class)
    {
        $classId = $class->event->schema_class->pluck("id");
        $assessis = DataAssessiModel::whereDoesntHave('assessis', function ($query) use ($classId) {
            return $query->whereIn('class_id', $classId);
        })->get();
        return view('admin.assessi.CreateAssessi',[
            'class' => $class->id,
            'title'=>'Data Assessi',
            'assessor'=>  $class->assessors,
            'assessi'=>$assessis,
        ]);
    }

    public function store(Request $request, SchemaClassModel $class)
    {
        $request->validate([
            'data_assessi_id' => 'required',
            'assessor_id' => 'required',
        ]);
        $assessis = new AssessiModel([
            'data_assessi_id' => $request->data_assessi_id,
            'assessor_id' => $request->assessor_id,
            'class_id' => $class->id
        ]);
       
        $assessis->save();

        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('toast_success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SchemaClassModel $class, AssessiModel $assessi)
    {
        $classId = $class->event->schema_class->pluck("id");
        $data_assessi = DataAssessiModel::whereDoesntHave('assessis', function ($query) use ($classId) {
            return $query->whereIn('class_id', $classId);
        })->get();
        $data_assessi->push($assessi->data_assessi);
        return view('admin.assessi.EditAssessi',[
            'title' => 'Data assessi',
            'class'=>$class->id,
            'assessis'=>$assessi,
            'assessor'=>$class->assessors,
            'data_assessi'=> $data_assessi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SchemaClassModel $class, AssessiModel $assessi)
    {
        $rules=[
            'assessor_id' => 'required',
            'data_assessi_id' => 'required',
        ];
        
        $validateData['assessor_id']=$request->assessor_id;
        $validateData['data_assessi_id']=$request->data_assessi_id;
        $validateData['class_id']=$class->id;
        $validateData= $request->validate($rules);
        $assessi->update($validateData);

        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('toast_success', 'Data assessi berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(SchemaClassModel $class, AssessiModel $assessi)
    {
        AssessiModel::destroy($assessi->id);
        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('toast_success', 'Data Assessi berhasil di hapus!');
    }

    // .
    // .
    // .
    // DATA ASSESSI KESELURUHAN

    //index
    public function index_data_assessi(AdminModel $admin)
    {
        $data = $admin->where('id', Auth::user()->id)->get();
        return view('admin.data_assessi.ListDataAssessi', [
            'data_assessi' => DataAssessiModel::all(),
            'title' => 'asesi',
            'admin' => $data
        ]);
    }
    //create
    public function create_data_assessi()
    {
       
        return view('admin.data_assessi.CreateDataAssessi',[
            'title' => 'Data assessi',
        ]);
    }
    //store
    public function store_data_assessi(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:data_assessi',
        ]);
        $data_assessi = new DataAssessiModel([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $data_assessi->save();

        return redirect('/dataAssessi')->with('toast_success', 'Data Asesi berhasil di tambahkan!');
    }
    //edit
    public function edit_data_assessi(DataAssessiModel $data_assessi)
    {
        
        return view('admin.data_assessi.EditDataAssessi',[
            'title' => 'Data assessi',
            'data_assessi' => $data_assessi,
        ]);
    }
    //update
    public function update_data_assessi(Request $request, DataAssessiModel $data_assessi)
    {
        $rules = [
            'name' => 'required',
            
        ];
        if ($request->email != $data_assessi->email) {
            $rules['email'] = 'required|unique:data_assessi';
        }
        $validateData = $request->validate($rules);
        $data_assessi->update($validateData);

        return redirect('/dataAssessi')->with('toast_success', 'Data assessi berhasil di Update!');
    }
    //destroy
    public function destroy_data_assessi(DataAssessiModel $data_assessi)
    {
        DataAssessiModel::destroy($data_assessi->id);
        return redirect('/dataAssessi')->with('toast_success', 'Data Assessi berhasil di hapus!');
       
    }
}
