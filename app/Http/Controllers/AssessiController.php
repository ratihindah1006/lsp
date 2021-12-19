<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Http\Request;

class AssessiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AssessiModel $assessi)
    {
        return view('assessi.assessiDashboard',[
            'assessi' => $assessi->name,
            'title'=> 'assessi',
        ]);
    }
    
}