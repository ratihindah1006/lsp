<?php

namespace App\Http\Controllers;

<<<<<<< HEAD
use App\Models\AK01;
use App\Models\Apl01;
use App\Models\MUK01;
use App\Models\Answer;
use App\Models\APL02Model;
use App\Models\AssessiModel;
use Illuminate\Http\Request;
use App\Models\AssessorModel;
use App\Models\DataAssessorModel;
use Illuminate\Support\Facades\Auth;
=======
use App\Models\APL02Model;
use App\Models\AssessorModel;
use App\Models\DataAssessorModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d

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
<<<<<<< HEAD

    public function ak01(AssessiModel $assessi)
    {
        $data = [
            'ak01' => $assessi->ak01,
            'title' => 'AK01',
            'event_start' => $assessi->schema_class->event->event_time,
            'tuk' => $assessi->schema_class->tuk,
            'assessor' => Auth::user()->name,
            'assessi' => $assessi, 
            'schema' => $assessi->schema_class->schema    
        ];

        return view('assessor.ak01', $data);
    }

    public function updAK01(Request $request)
    {
        $request->tl_verif_porto == "on" ? $request->tl_verif_porto = 1 : $request->tl_verif_porto = 0;
        $request->l_obs_langsung == "on" ? $request->l_obs_langsung = 1 : $request->l_obs_langsung = 0;
        $request->t_p_tulis == "on" ? $request->t_p_tulis = 1 : $request->t_p_tulis = 0;
        $request->t_p_lisan == "on" ? $request->t_p_lisan = 1 : $request->t_p_lisan = 0;
        $request->t_p_wawancara == "on" ? $request->t_p_wawancara = 1 : $request->t_p_wawancara = 0;
        $data = [
            'tl_verif_porto' => $request->tl_verif_porto,
            't_p_tulis' => $request->t_p_tulis,
            't_p_lisan' => $request->t_p_lisan,
            't_p_wawancara' => $request->t_p_wawancara,
            'l_obs_langsung' => $request->l_obs_langsung,
            'tuk' => $request->tuk,
        ];

        AK01::updateOrCreate(
            ['assessi_id' => $request->assessiId],
            $data
        );

        return redirect('/list')->with('success', 'Form AK01 berhasil di Update!');
    }

    public function muk01(AssessiModel $assessi)
    {
        $data = [
            'title' => 'MUK01',
            'assessi' => $assessi,
            'assessor' => Auth::user()->name,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
        ];

        return view('assessor.muk01', $data);
    }

    public function updMUK01(Request $request)
    {
        $data = [
            'assessi_id' => $request->assessiId,
            'rekomendasi' => $request->rekomendasi
        ];
        MUK01::updateOrCreate(
            ['assessi_id' => $request->assessiId],
            $data
        );
        
        return redirect('/list')->with('success', 'Form MUK01 berhasil di Update!');
    }

    public function muk06(AssessiModel $assessi)
    {
        $answer = Answer::all()->where('assessi_id', $assessi->id);
        $data = [
            'title' => 'assessi',
            'assessi' => $assessi,
            'assessor' => Auth::user()->name,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'answer' => $answer
        ];
        return view('assessor.muk06', $data);
    }

    public function saveMUK06(Request $request)
    {
        $rekomendasi = null;
        if (count($request->rekomendasi) > 0) {
            foreach ($request->rekomendasi as $key => $value) {
                if($request->rekomendasi[$key] == "K" ){
                    $rekomendasi = 1;
                } else if ($request->rekomendasi[$key] == "BK"){
                    $rekomendasi = 0;
                } else {
                    $rekomendasi = null;
                }
                $data=array(
                    'rekomendasi' => $rekomendasi
                );
                
                Answer::updateOrCreate(
                    ['assessi_id' => $request->assessiId, 'unit_id' => $request->unitId[$key]],
                    $data
                );
            }            
        }
        return redirect('/list')->with('success', 'Form MUK06 berhasil disimpan!');
    }
=======
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
}
