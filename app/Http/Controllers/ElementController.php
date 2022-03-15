<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Http\Request;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use App\Models\ElementModel;
use Illuminate\Support\Facades\Auth;


class ElementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryModel $category, SchemaModel $schema, UnitModel $unit, AdminModel $admin)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.element.ListElement', [
            'category'=>$category->id,
            'schema' => $schema->id,
            'unit' => $unit,
            'element'=> $unit->elements,
            'admin'=> $data,
            'title'=>'Element'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $category, SchemaModel $schema, UnitModel $unit)
    {
        $validateData = $request->validate([
            'element_title' => 'required',
            'benchmark' => 'required',
        ]);
        $validateData['unit_id']=$unit->id;
        ElementModel::create($validateData);

        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit'.'/'.$unit->id.'/element')
        ->with('success', 'Element berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        return view('admin.element.EditElement', [
            'category'=>$category,
            'schema' => $schema,
            'unit' => $unit,
            'element'=>$element,
            'title'=>'Element'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        $rules=[
            'element_title' => 'required',
            'benchmark' => 'required'
        ];
        $validateData['unit_id']=$unit->id;
        $validateData= $request->validate($rules);
        $element->update($validateData);

        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit'.'/'.$unit->id.'/element')->with('success', 'Element berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        $element->delete();
        return redirect('/category'.'/'.$category->id.'/schema'.'/'.$schema->id.'/unit'.'/'.$unit->id.'/element')->with('success', 'Element berhasil di hapus!');
    }
}
