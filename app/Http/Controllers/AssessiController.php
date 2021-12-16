<?php

namespace App\Http\Controllers;

use App\Models\Assessi;
use Illuminate\Http\Request;

class AssessiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assessi.assessiDashboard',[
            'title'=> 'assessi',
        ]);
    }
    
}