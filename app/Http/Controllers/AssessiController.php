<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssessiModel $assessis)
    {
        $assessi = AssessiModel::find(Auth::user()->id);

        return view('assessi.assessiDashboard',[
            'title'=> 'assessi',
            'assessi'=> $assessi->apl01,
        ]);
    }
    
}