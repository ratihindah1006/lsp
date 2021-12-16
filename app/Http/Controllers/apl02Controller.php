<?php

namespace App\Http\Controllers;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use App\Models\ElementModel;
use App\Models\CriteriaModel;

use Illuminate\Http\Request;

class Apl02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchemaModel $schema)
    {
        $data = $schema->units()->get();

        return view('admin.APL02.detailSchema', [
            'schema' => $schema,
            'unit' => $data,]
        );
    }
}