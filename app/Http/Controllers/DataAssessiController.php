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
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.assessi.listAssessi', [
            'class'=>$class->id,
            'assessi' => $class->assessis,
            'title' => 'asesi',
            'admin'=>$data
        ]);
    }

    public function data_assessi(AdminModel $admin, SchemaClassModel $class)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.dataAssessi.listDataAssessi', [
            'class'=>$class->id,
            'assessi' => $class->assessis,
            'title' => 'asesi',
            'admin'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SchemaClassModel $class, DataAssessiModel $assessi)
    {
        $class=$class;
        $title = 'Data assessi';
        $assessor = $class->assessors;
        
        $assessi = DataAssessiModel::all();
        
        return view('admin.assessi.CreateAssessi', compact('title', 'assessor', 'class', 'assessi'));
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
            'assessi_id' => 'required',
            'assessor_id' => 'required',
        ]);
        $assessis = new AssessiModel([
            'data_assessi_id' => $request->assessi_id,
            'assessor_id' => $request->assessor_id,
            'class_id' => $class->id
        ]);
        $assessis->save();
   
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesi')->with('success', 'Data Asesi berhasil di tambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AssessiModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(SchemaClassModel $class, AssessiModel $assessi)
    {
        $title = 'Data assessi';
        $class = $class;
        $assessi = $assessi;
        $assessor = $class->assessors;
        return view('admin.assessi.EditAssessi', compact('title','class', 'assessor', 'assessi', ));
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
            'name' =>'required',
            'password' =>'required',
            'assessor_id' => 'required',
        ];
        if($request->email != $assessi->email){
            $rules['email'] = 'required';
        }
        $validateData['class_id']=$class->id;
        $validateData= $request->validate($rules);
        $assessi->update($validateData);

        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesi')->with('success', 'Data assessi berhasil di Update!');
        
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
        return redirect('/KelasSkema'.'/'.$class->id.'/dataAsesi')->with('success', 'Data Assessi berhasil di hapus!');
    }

    public function create_data()
    {
        $title = 'Data assessi';
        return view('admin.dataAssessi.CreateDataAssessi', compact('title'));
    }

    public function store_data(Request $request)
    {
  
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
          
        ]);
        
        $assessis = new DataAssessiModel([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
           
        ]);
        
        $assessis->save();
   
        return redirect('/dataAssessi')->with('success', 'Data Asesi berhasil di tambahkan!');
    }
}