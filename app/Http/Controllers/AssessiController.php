<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $assessi)
    {
        $data = DataAssessiModel::find(Auth::user()->id);
        $data3=$data->assessis;

        $data2 = $assessi->where('id', Auth::user()->id)->get();
       
        $assessi = DataAssessiModel::find(Auth::user()->id);

        return view('assessi.assessiDashboard', [
            'title' => 'assessi',
            'assessis' => $data3,
            'data2' => $data2,
            'assessi' => $assessi->assessis->find(Auth::user()->id),
        ]);
    }
}