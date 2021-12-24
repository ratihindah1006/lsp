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
        $assessis = AssessiModel::all();

        foreach ($assessis as $assessi) {
        echo $assessi->schema->schema_title;}

        //$data=$assessi->where('id', Auth::user()->id)->get();
        //dd($assessis);
        return view('assessi.assessiDashboard',[
            'assessi' => $assessi,
            'title'=> 'assessi',
            
        ]);
    }
    
}