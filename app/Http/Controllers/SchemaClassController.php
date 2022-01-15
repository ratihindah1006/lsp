<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminModel;
use App\Models\AssessorModel;
use App\Models\EventModel;
use App\Models\SchemaClassModel;
use App\Models\SchemaModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use Illuminate\Support\Testing\Fakes\EventFake;



class SchemaClassController extends Controller
{
    public function index(AdminModel $admin, EventModel $event)
    {
        $admin=$admin->where('id', Auth::user()->id)->get();
        $event= $event->event_code;
        $class = SchemaClassModel::all();
        $assessor = AssessorModel::all();
        $title = 'Kelas Skema';
        return view('admin.schema_class.listSchemaClass', compact('class','title','admin', 'event','assessor'));
    }

    public function create()
    {
        $event = DB::table('event')->get();
        $schema = DB::table('schema')->get();
        $title= 'Tambah Kelas Skema';
        return view('admin.schema_class.createSchemaClass', compact('event', 'schema', 'title'));
    }

    public function event($id){
        $event=(DB::table('event')->where('event_id', $id)->get());
        return response()->json($event);
    }
    public function schema($id){
        $schema=(DB::table('schema')->where('schema_id', $id)->get());
        return response()->json($schema);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:schema_class',
            'tuk' => 'required',
            'description' => 'required',
            'event_id' => 'required',
            'schema_id' => 'required'
        ]);
        $class = new SchemaClassModel([
            'name' => $request->name,
            'tuk' => $request->tuk,
            'description' => $request->description,
            'event_id' =>  $request->event_id,
            'schema_id' =>  $request->schema_id,
        ]);
       
        $class->save();
        return redirect('/KelasSkema')->with('success', 'Data kelas Skema berhasil di tambahkan!');
    }

    public function edit(SchemaClassModel $class)
    {
        $event = EventModel::all();
        $schema = SchemaModel::all();
        $title= 'Data Kelas Skema';
        $class= $class;
        return view('admin.schema_class.editSchemaClass', compact('title','event', 'class','schema'));
    }

    public function update(Request $request, SchemaClassModel $class)
    {
        $rules=[
            'tuk' => 'required',
            'description' => 'required',
            'event_id' => 'required',
            'schema_id' => 'required'
        ];
        if($request->name != $class->name){
            $rules['name'] = 'required|unique:schema_class';
        }
        $validateData= $request->validate($rules);
        $class->update($validateData);
        return redirect('/KelasSkema')->with('success', 'Data Kelas Skema berhasil di Update!');
        
    }

    public function destroy(SchemaClassModel $class)
    {
        SchemaClassModel::destroy($class->id);
        return redirect('/KelasSkema')->with('success', 'Data Kelas Skema berhasil di hapus!');
    }
}
