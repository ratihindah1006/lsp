<?php

namespace App\Http\Controllers;

use App\Models\CriteriaModel;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use App\Models\ElementModel;

use Illuminate\Http\Request;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        return view('admin.criteria.ListCriteria', [
            'category'=>$category->category_code,
            'schema' => $schema->schema_code,
            'unit' => $unit->unit_code,
            'element'=> $element->element_code,
            'criteria'=> $element ->criterias,
            'title'=> 'Kriteria'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($category, $schema, $unit, $element)
    {
        return view('admin.criteria.CreateCriteria', [
            'category'=>$category,
            'schema'=>$schema,
            'unit'=>$unit,
            'element'=>$element,
            'title'=> 'Kriteria'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        $validateData = $request->validate([
            'criteria_code' => 'required|unique:criteria_models',
            'criteria_title' => 'required',
        ]);
        $validateData['element_id']=$element->id;
        CriteriaModel::create($validateData);

        return redirect('/category'.'/'.$category->category_code.'/schema'.'/'.$schema->schema_code.'/unit'.'/'
                        .$unit->unit_code.'/element'.'/'.$element->element_code.'/criteria')
                        ->with('success', 'Unit berhasil di tambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CriteriaModel  $criteriaModel
     * @return \Illuminate\Http\Response
     */
    public function show(CriteriaModel $criteriaModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CriteriaModel  $criteriaModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        return view('admin.criteria.EditCriteria', [
            'category'=>$category,
            'schema' => $schema,
            'unit' => $unit,
            'element'=>$element,
            'criteria'=>$criteria,
            'title'=> 'Kriteria'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CriteriaModel  $criteriaModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        $validateData = $request->validate([
            'criteria_code' => 'required',
            'criteria_title' => 'required',
        ]);
        $validateData['element_id']=$element->id;
        $criteria->update($validateData);

        return redirect('/category'.'/'.$category->category_code.'/schema'.'/'.$schema->schema_code.'/unit'.'/'
                        .$unit->unit_code.'/element'.'/'.$element->element_code.'/criteria')
                        ->with('success', 'Unit berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CriteriaModel  $criteriaModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category, SchemaModel $schema, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        $criteria->delete();
        return redirect('/category'.'/'.$category->category_code.'/schema'.'/'.$schema->schema_code.'/unit'.'/'
                        .$unit->unit_code.'/element'.'/'.$element->element_code.'/criteria')
                        ->with('success', 'Element berhasil di hapus!');
    }
}
