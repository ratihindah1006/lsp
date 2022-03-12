<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryModel $category, SchemaModel $schema,AdminModel $admin)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.unit.ListUnit', [
            'category'=>$category->id,
            'schema' => $schema->id,
            'unit' => $schema->units,
            'title' => 'Unit',
            'admin'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category, $schema)
    {
        return view('admin.unit.CreateUnit', [
            'category'=>$category,
            'schema'=>$schema,
            'title' => 'Unit'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $category, SchemaModel $schema)
    {
        $validateData = $request->validate([
            'unit_code' => 'required|unique:unit',
            'unit_title' => 'required',
        ]);
        $validateData['schema_id']=$schema->id;
        UnitModel::create($validateData);

        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit')->with('success', 'Unit berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function show(UnitModel $unitModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category, SchemaModel $schema, UnitModel $unit)
    {
        return view('admin.unit.EditUnit', [
            'category'=>$category,
            'schema' => $schema,
            'unit' => $unit,
            'title' => 'Unit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $category, SchemaModel $schema, UnitModel $unit)
    {
        $rules = [
            'unit_title' => 'required'
        ];
        if($request->unit_code != $unit->unit_code){
            $rules['unit_code'] = 'required|unique:unit';
        }
        $validateData['schema_id']=$schema->id;
        $validateData= $request->validate($rules);
        $unit->update($validateData);

        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit')->with('success', 'Unit berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnitModel  $unitModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category, SchemaModel $schema, UnitModel $unit)
    {
        $unit->delete();
        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit')->with('success', 'Unit berhasil di hapus!');
    }
}
