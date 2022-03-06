<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use App\Models\DataAssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $assessi, AssessiModel $asesi)
    {
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi=$dataAssessi->assessis;
        //dd($assessi->find('id'));

        return view('assessi.assessiDashboard', [ 
            'title' => 'assessi',
            'assessis' => $assessi,
            'assessi' => $assessi->find($asesi->id),
        ]);
    }
}