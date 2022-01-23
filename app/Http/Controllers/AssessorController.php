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
            'assessis'=> $assessor->schema_class->schema,

        ]);
    }

    public function apl02(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        if (isset($assessi->apl02->assessment)){
            $assessment=json_decode($assessi->apl02->assessment);
        }
        else{
            $assessment=[];
        }
        return view('assessor.apl02', [
            'title' => 'APL02',
            'asesi' => $assessi,
            'skema' => $assessor->schema_class->schema,
            'asesor' => $assessor,
            'apl01' => $assessi->apl01,
            'class' => $assessor->schema_class,
            'units' => $assessor->schema_class->schema->units,
            'apl02' => $assessi->apl02,
            'assessment' => $assessment,

        ]);
    }

    public function status(Request $request, AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        $assessi = $assessi->assessi_id;
        $cek = $assessor->assessis;
        $validateData = $request->validate([
            'assessor_signature'=>'required|image|file|max:1024',
            'status' => 'required',
        ]);
        $validateData['assessor_signature'] = $request->file('assessor_signature')->store('assessor_signature');
        foreach($cek as $value)
        { 
            if($value->apl01 != null){
                $value->apl01->update($validateData);
            } }
        return redirect('/list')->with('success', 'Status berhasil di Update!');
    }


}