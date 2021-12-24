<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\APL02Model;
use App\Models\SchemaModel;
use Illuminate\Http\Request;

class Apl02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssessiModel $assessi)
    {
       // $data=$assessi->where('id', Auth::user()->id)->get();
        $assessis = AssessiModel::all();

        
//dd($assessi);
        return view('assessi.apl02', [
            'schema' => $assessi->schema,
            'title'=> 'apl02',
            'assessis' => $assessis,]
        );
    }
}