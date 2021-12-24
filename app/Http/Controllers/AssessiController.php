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
    public function index(AssessiModel $assessi)
    { $data=$assessi->where('id', Auth::user()->id)->get();
       
        //dd($data);
        return view('assessi.assessiDashboard',[
            'assessi' => $data,
            'title'=> 'assessi',
            
        ]);
    }
    
}