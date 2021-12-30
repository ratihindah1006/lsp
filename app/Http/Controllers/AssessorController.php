<?php

namespace App\Http\Controllers;

use App\Models\APL02Model;
use App\Models\AssessorModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assessor.assessorDashboard',[
            'title'=> 'assessor',
        ]);
    }

    public function list(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        return view('assessor.listAssessi',[
            'title'=> 'List Assessi',
            'assessi'=>$assessi->apl01,
            'assessis' => $assessor->assessis,
        ]);
    }

    public function apl01(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        return view('assessor.apl01', [
          //  'assessi'=>$assessi,
           'apl01' => $assessi->apl01,
            'title' => 'Skema',
            'assessis'=> $assessor->schema,

        ]);
    }


}