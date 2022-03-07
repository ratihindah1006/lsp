<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $data_assessi)
    {
        $data_assessi = DataAssessiModel::find(Auth::user()->id);
        $assessi=$data_assessi->assessis;

        $data2 = $data_assessi->where('id', Auth::user()->id)->get();
        
       //dd($data_assessi->assessis);
        // foreach ($data_assessi->assessis as $a) {
        //     dd($a->apl01);
            
        // }

        return view('assessi.assessiDashboard', [
            'title' => 'assessi',
            'assessis' => $assessi,
            'data2' => $data2,
            'assessi' => $data_assessi->assessis,
        ]);
       
    }
}