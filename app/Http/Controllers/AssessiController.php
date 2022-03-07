<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use App\Models\DataAssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $data_assessi)
    {
        $data_assessi = DataAssessiModel::find(Auth::user()->id);
        return view('assessi.assessiDashboard', [
            'title' => 'assessi',
            'assessis' => $data_assessi->assessis,
        ]);
       
    }
}