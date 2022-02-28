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
        $data=$assessis->where('email', Auth::user()->email)->get();
        $data2=$assessis->where('id', Auth::user()->id)->get();
        $assessi = AssessiModel::find(Auth::user()->id);

     
        return view('assessi.assessiDashboard',[
            'title'=> 'assessi',
            'assessis'=> $data,
            'data2'=> $data2,
            'assessi'=> $assessi->apl01,
        ]);
    }
    
}