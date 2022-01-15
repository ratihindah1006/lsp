<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\AdminModel;
use App\Models\SchemaClassModel;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class SchemaClassController extends Controller
{
    public function index(AdminModel $admin)
    {
        $admin=$admin->where('id', Auth::user()->id)->get();
        $class = SchemaClassModel::all();
        $title = 'Kelas Skema';
        return view('admin.schema_class.listSchemaClass', compact('class','title','admin'));
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
}
