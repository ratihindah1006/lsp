<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use App\Models\AssessorModel;
use App\Models\CategoryModel;
use Illuminate\Support\Facades\DB;

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
        $category = DB::table('category_models')->get();
        $assessor = DB::table('assessor')->get();
        $title= 'Data asesi';
        return view('admin.assessi.CreateAssessi', compact('category', 'assessor', 'title'));
    }

    public function schemaAssessi($id)
    {
        $schema=(DB::table('schema_models')->where('field_id', $id)->get());
        return response()->json($schema);
    }

    public function assessorAssessi($id){
        $assessor=(DB::table('assessor')->where('schema_id', $id)->get());
        return response()->json($assessor);
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
            'schema_id' => 'required',
            'assessor_id' => 'required'
        ]);
       $assessis = new AssessiModel([
        'name' => $request->name,
        'email' => $request->email,
        'password'=> $request->password,
        'field_id' =>  $request->field_id,
        'schema_id' =>  $request->schema_id,
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
        $field = CategoryModel::all();
        $title= 'Data assessi';
        $assessi= $assessi;
        $assessorSelected= $assessi->assessor;
        $fieldse = $assessi->category;
        $schemaSelected = $assessi->schema;
        return view('admin.assessi.EditAssessi', compact('title','field', 'assessi', 'assessorSelected', 'fieldse','schemaSelected'));
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
            'schema_id' => 'required',
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