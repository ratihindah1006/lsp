<?php

namespace App\Http\Controllers;

use App\Models\APL02Model;
use App\Models\AssessorModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('assessor.assessorDashboard',[
            'title'=> 'assessor',
        ]);
    }

    public function list()
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        return view('assessor.listAssessi',[
            'title'=> 'List Assessi',
            'assessis' => $assessor->assessis,
        ]);
    }

    public function apl01(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        return view('assessor.apl01', [
           'apl01' => $assessi->apl01,
            'title' => 'Skema',
            'assessis'=> $assessor->schema,

        ]);
    }

    public function status(Request $request, AssessiModel $assessi)
    {
      
        $validateData = $request->validate([
            'status' => 'required',
        ]);
        $validateData['assessi_id']=$assessi->id;
        Apl01::where('assessi_id', $assessi->id)
            ->update(['status'=>$validateData]);
        
        //dd($validateData);
      //$apl01->save();
        return redirect('/list')->with('success', 'Status berhasil di Update!');
    }


}