<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $assessis)
    {
        $data = $assessis->where('email', Auth::user()->email)->get();

        $data2 = $assessis->where('id', Auth::user()->id)->get();
        $assessi = DataAssessiModel::find(Auth::user()->id);

        return view('assessi.assessiDashboard', [
            'title' => 'assessi',
            'assessis' => $data,
            'data2' => $data2,
            'assessi' => $assessi->apl01,
        ]);
    }
}
