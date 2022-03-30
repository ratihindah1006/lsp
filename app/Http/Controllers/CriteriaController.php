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
    public function index(CategoryModel $category, UnitModel $unit, ElementModel $element)
    {
        return view('admin.criteria.ListCriteria', [
            'category' => $category->id,
            'unit' => $unit->id,
            'element' => $element,
            'criteria' => $element->criterias,
            'title' => 'Kriteria'
        ]);
    }

    public function create($category, $unit, $element)
    {
        return view('admin.criteria.CreateCriteria', [
            'category' => $category,
            'unit' => $unit,
            'element' => $element,
            'title' => 'Kriteria'
        ]);
    }

    public function store(Request $request, CategoryModel $category, UnitModel $unit, ElementModel $element)
    {
        $validateData = $request->validate([
            'criteria_title' => 'required',
            'no_criteria' => 'required'
        ]);
        $validateData['element_id'] = $element->id;
        CriteriaModel::create($validateData);

        return redirect('/category' . '/' . $category->id .  '/unit' . '/'
            . $unit->id . '/element' . '/' . $element->id . '/criteria')
            ->with('toast_success', 'Kriteria berhasil di tambahkan!');
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

    public function edit(CategoryModel $category, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        return view('admin.criteria.EditCriteria', [
            'category' => $category,
            'unit' => $unit,
            'element' => $element,
            'criteria' => $criteria,
            'title' => 'Kriteria'
        ]);
    }

    public function update(Request $request, CategoryModel $category, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        $rules = [
            'criteria_title' => 'required',
            'no_criteria' => 'required'
        ];
        
        $validateData['element_id'] = $element->id;
        $validateData = $request->validate($rules);
        $criteria->update($validateData);

        return redirect('/category' . '/' . $category->id . '/unit' . '/'
            . $unit->id . '/element' . '/' . $element->id . '/criteria')
            ->with('toast_success', 'Kriteria berhasil di Update!');
    }

    public function destroy(CategoryModel $category, UnitModel $unit, ElementModel $element, CriteriaModel $criteria)
    {
        $criteria->delete();
        return redirect('/category' . '/' . $category->id . '/unit' . '/'
            . $unit->id . '/element' . '/' . $element->id . '/criteria')
            ->with('toast_success', 'Kriteria berhasil di hapus!');
    }
}
