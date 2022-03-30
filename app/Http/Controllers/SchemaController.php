<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use App\Models\ElementModel;
use App\Models\CriteriaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminModel $admin)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.schema.ListSchema', [
            'schema' => SchemaModel::all(),
            'title' => 'Skema',
            'admin'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.schema.CreateSchema', [
            'category'=>CategoryModel::all(),
            'title' => 'Skema'
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
            'category_id' => 'required',
            'schema_title' => 'required',
            'requirement' => 'required',
            'competency_package' => 'required',
            'cost' => 'required',
        ]);
        SchemaModel::create($validateData);

        return redirect('/skema')->with('toast_success', 'Skema berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SchemaModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $category, SchemaModel $schema)
    {
        $data = $schema->units()->get();

        return view('admin.schema.detailSchema', [
            'category'=>$category,
            'schema' => $schema,
            'title' => 'File Skema',
            'unit' => $data,
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchemaModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit( SchemaModel $schema)    {
        return view('admin.schema.EditSchema', [
            'category'=>CategoryModel::all(),
            'schema' => $schema,
            'title' => 'Skema'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SchemaModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $category, SchemaModel $schema)
    {
        $rules=[
            'category_id' => 'required',
            'schema_title' => 'required',
            'requirement' => 'required',
            'competency_package' => 'required',
            'cost' => 'required',
        ];
        
      
        $validateData= $request->validate($rules);
        $schema->update($validateData);

        return redirect('/skema')->with('toast_success', 'Skema berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SchemaModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category, SchemaModel $schema)
    {
        $schema->delete();
        return redirect('/skema')->with('toast_success', 'Skema berhasil di hapus!');
    }
}