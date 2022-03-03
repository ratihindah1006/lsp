<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\AssessiModel;
use App\Models\Assessis;
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
        return view('admin.assessi.listAssessi', [
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
    public function create(SchemaClassModel $class, DataAssessiModel $assessi)
    {
        
        return view('admin.assessi.CreateAssessi',[
            'class' => $class,
            'title'=>'Data Assessi',
            'assessor'=>  $class->assessors,
            'assessi'=>DataAssessiModel::all(),
        ]);
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
            'data_assessi_id' => 'required',
            'assessor_id' => 'required',
        ]);
        $assessis = new AssessiModel([
            'data_assessi_id' => $request->data_assessi_id,
            'assessor_id' => $request->assessor_id,
            'class_id' => $class->id
        ]);
       
        $assessis->save();

        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SchemaClassModel $class, AssessiModel $assessi)
    {
        return view('admin.assessi.EditAssessi',[
            'title' => 'Data assessi',
            'class'=>$class,
            'assessis'=>$assessi,
            'assessor'=>$class->assessors,
            'data_assessi'=> DataAssessiModel::all(),
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

        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('success', 'Data assessi berhasil di Update!');
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
        return redirect('/KelasSkema' . '/' . $class->id . '/dataAsesi')->with('success', 'Data Assessi berhasil di hapus!');
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
            'email' => 'required',
            'password' => 'required',
        ]);
        $data_assessi = new DataAssessiModel([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
        $data_assessi->save();

        return redirect('/dataAssessi')->with('success', 'Data Asesi berhasil di tambahkan!');
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
            'password' => 'required',
        ];
        if ($request->email != $data_assessi->email) {
            $rules['email'] = 'required';
        }
        $validateData = $request->validate($rules);
        $data_assessi->update($validateData);

        return redirect('/dataAssessi')->with('success', 'Data assessi berhasil di Update!');
    }
    //destroy
    public function destroy_data_assessi(DataAssessiModel $data_assessi)
    {
        DataAssessiModel::destroy($data_assessi->id);
        return redirect('/dataAssessi')->with('success', 'Data Assessi berhasil di hapus!');
    }
}
