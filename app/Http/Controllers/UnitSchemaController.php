<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitSchemaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationException;


class UnitSchemaController extends Controller
{
    public function index(SchemaModel $schema)
    {
        //$data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.unit_schema.ListUnit', [
            'schema' => $schema,
            'unit' => $schema->unit_schemas,
            'title' => 'Unit',

        ]);
    }

    public function create(Request $request, SchemaModel $schema, CategoryModel $category, UnitSchemaModel $units)

    {
        return view('admin.unit_schema.CreateUnit', [
            'schema' => $schema->id,
            'categories' => CategoryModel::all(),
            'units' =>UnitSchemaModel::where('schema_id', $schema->id)->get(),
            'un' => $schema->unit_schemas->pluck("unit_id"),
            'title' => 'Unit',
        ]);
    }

    public function store(Request $request, SchemaModel $schema, CategoryModel $category)
    {
        $unit = $request->unit;
        if($unit)
        $jml_dipilih = count($unit);
        else
        $jml_dipilih = 0;
        UnitSchemaModel::whereSchemaId($schema->id)->delete();
        for ($x = 0; $x < $jml_dipilih; $x++) {
            $tmp = explode("-",$unit[$x]);
            $unitId = $tmp[0];
            $categoryId = $tmp[1];
            $validateData['schema_id'] = $schema->id;
            $validateData['category_id'] = $categoryId;
            $validateData['unit_id'] = $unitId;
            UnitSchemaModel::create($validateData);
        }

        return redirect('/skema' . '/' . $schema->id . '/unit')->with('toast_success', 'unit berhasil di tambahkan!');
    }
}
