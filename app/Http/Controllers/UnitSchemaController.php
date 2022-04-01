<?php

namespace App\Http\Controllers;

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

    public function create(SchemaModel $schema)

    {
        //dd($schema->category->units);
        return view('admin.unit_schema.CreateUnit', [
            'schema' => $schema->id,
            'units' => $schema->category->units,
            'un' => $schema->unit_schemas->pluck("unit_id"),
            'title' => 'Unit',
        ]);
    }

    public function store(Request $request, SchemaModel $schema)
    {
        $unit = $request->unit;
        if($unit)
        $jml_dipilih = count($unit);
        else
        $jml_dipilih = 0;
        UnitSchemaModel::whereSchemaId($schema->id)->delete();
        for ($x = 0; $x < $jml_dipilih; $x++) {
            $validateData['schema_id'] = $schema->id;
            $validateData['unit_id'] = $unit[$x];
            $cek = $schema->unit_schemas;
                UnitSchemaModel::create($validateData);
        }

        return redirect('/skema' . '/' . $schema->id . '/unit')->with('toast_success', 'unit berhasil di tambahkan!');
    }
}
