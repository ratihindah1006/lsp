<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
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
    public function index(SchemaModel $schema, AssessiModel $assessi)
    {
        //$data = $schema->units()->get();
        $data=$assessi->where('id', Auth::user()->id)->get();
        $data2=$data->schema()->get();
        dd($data2);
        return view('admin.APL02.detailSchema', [
            'schema' => $schema,
            'assessi'=>$data,
            'unit' => $data,]
        );
    }
}