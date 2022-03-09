<?php

namespace App\Http\Controllers;

use App\Models\APL02Model;
use App\Models\AssessorModel;
use App\Models\DataAssessorModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AssessorController extends Controller
{

    public function index()
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        return view('assessor.assessorDashboard', [
            'title' => 'assessor',
            'assessor' => $data_assessor,
        ]);
    }

    public function list()
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        return view('assessor.listAssessi', [
            'title' => 'List Assessi',
            'assessi' => $data_assessor,
        ]);
    }

    public function apl01(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        return view('assessor.apl01', [
            'apl01' => $assessi->apl01,
            'assessi' => $assessi,
            'title' => 'Skema',
            'assessis' => $assessor->schema_class->schema,

        ]);
    }

    public function apl02(AssessiModel $assessi)
    {
        $assessor = AssessorModel::find(Auth::user()->id);
        if (isset($assessi->apl02->assessment)) {
            $assessment = json_decode($assessi->apl02->assessment);
        } else {
            $assessment = [];
        }
        return view('assessor.apl02', [
            'title' => 'APL02',
            'assessi' => $assessi,
            'skema' => $assessor->schema_class->schema,
            'asesor' => $assessor,
            'apl01' => $assessi->apl01,
            'class' => $assessor->schema_class,
            'units' => $assessor->schema_class->schema->units,
            'apl02' => $assessi->apl02,
            'assessment' => $assessment,

        ]);
    }

    public function status_apl01(Request $request, Apl01 $apl01, $id)
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            foreach ($a->assessis as $b) {
                $assessi = $b->find($id);
                if ($assessi->apl01 != null) {
                    $validateData = $request->validate([
                        'assessor_signature' => 'required|image|file|max:1024',
                        'status' => 'required',
                    ]);
                    $validateData['assessi_id'] = $assessi->id;
                    $validateData['assessor_signature'] = $request->file('assessor_signature')->store('assessor_signature');
                    $assessi->apl01->update($validateData);
                }
            }
        }
        return redirect('/list')->with('success', 'Status berhasil di Update!');
    }

    public function status_apl02(Request $request, $id)
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            foreach ($a->assessis as $b) {
                $assessi = $b->find($id);
                if ($assessi->apl02 != null) {
                    $validateData = $request->validate([
                        'status' => 'required',
                        'lane' => 'required',
                    ]);
                    $validateData['note'] = $request->note;
                    $validateData['assessi_id'] = $assessi->id;
                    $assessi->apl02->update($validateData);
                }
            }
        }
        return redirect('/list')->with('success', 'Status berhasil di Update!');
    }
}
