<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\APL02Model;
use App\Models\ElementModel;
use App\Models\SchemaModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;

class Apl02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssessiModel $assessi, SchemaModel $schema, UnitModel $unit, ElementModel $element)
    {
        $assessi=AssessiModel::find(Auth::user()->id);
        //dd($assessi);
    
        return view('assessi.apl02', [
            'assessi' => $assessi,
            'title'=> 'apl02',
            ]
        );
    }
}