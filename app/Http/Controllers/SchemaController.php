<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use App\Models\ElementModel;
use App\Models\CriteriaModel;
use Illuminate\Http\Request;

class SchemaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryModel $category)
    {
        return view('admin.schema.ListSchema', [
            'category'=>$category->category_code,
            'schemas' => $category->schemas,
            'title' => 'Skema'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category)
    {
        return view('admin.schema.CreateSchema', [
            'category_code'=>$category,
            'title' => 'Skema'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $category)
    {
        $validateData = $request->validate([
            'schema_code' => 'required|unique:schema_models',
            'schema_title' => 'required',
        ]);
        $validateData['id_category']=$category->id;
        SchemaModel::create($validateData);

        return redirect('/category'.'/'.$category->category_code.'/schema')->with('success', 'Category berhasil di tambahkan!');
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
            'unit' => $data,
            ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SchemaModel  $schemaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category, SchemaModel $schema)
    {
        return view('admin.schema.EditSchema', [
            'category'=>$category,
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
            'schema_title' => 'required'
        ];
        if($request->schema_code != $schema->schema_code){
            $rules['schema_code'] = 'required|unique:schema_models';
        }
        $validateData['id_category']=$category->id;
        $validateData= $request->validate($rules);
        $schema->update($validateData);

        return redirect('/category'.'/'.$category->category_code.'/schema')->with('success', 'Schema berhasil di Update!');
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
        return redirect('/category'.'/'.$category->category_code.'/schema')->with('success', 'Category berhasil di hapus!');
    }
}