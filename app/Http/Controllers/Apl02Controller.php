<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\APL02Model;
use App\Models\DataAssessiModel;
use App\Models\CriteriaModel;
use App\Models\SchemaModel;
use Illuminate\Http\Request;
use PDF; //library pdf

class Apl02Controller extends Controller
{
    public function index($id)
    {
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi = $dataAssessi->assessis->find($id);
        if (isset($assessi->apl02->assessment)) {
            $assessment = json_decode($assessi->apl02->assessment);
        } else {
            $assessment = [];
        }
        if (isset($assessi->apl02->transcript)) {
            $transcript = json_decode($assessi->apl02->transcript);
        } else {
            $transcript = [];
        }
        if (isset($assessi->apl02->work_exper_certif)) {
            $work_exper_certif = json_decode($assessi->apl02->work_exper_certif);
        } else {
            $work_exper_certif = [];
        }
        if ($assessi != null && $assessi->apl01 != null) {
            return view(
                'assessi.apl02',
                [
                    'title' => 'apl02',
                    'asesi' => $assessi,
                    'skema' => $assessi->schema_class->schema,
                    'apl01' => $assessi->apl01,
                    'asesor' => $assessi->assessor,
                    'class' => $assessi->schema_class,
                    'units' => $assessi->schema_class->schema->unit_schemas,
                    'apl02' => $assessi->apl02,
                    'assessment' => $assessment,
                    'transcript' => $transcript,
                    'work_exper_certif' => $work_exper_certif,
                ]
            );
        } else {
            return view(
                'assessi.gagal',
                [
                    'title' => '404',
                ]
            );
        }
    }

    public function store(Request $request, SchemaModel $schema, $id)
    {
        $request->assessi_agreement == "on" ? $request->assessi_agreement = 1 : $request->assessi_agreement = 0;
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi = $dataAssessi->assessis->find($id);
        
        $assessment = [];
        $pattern = "/element_/i";
        foreach($request->all() as $key => $val) {
            if(preg_match($pattern, $key)){
                $assessment[] = $val;
            }
        }
        $transcript = [];
        $pattern = "/elemen_/i";
        foreach($request->all() as $key => $val) {
            if(preg_match($pattern, $key)){
                $transcript[] = $val;
            }
        }
        $work_exper_certif = [];
        $pattern = "/elemenn_/i";
        foreach($request->all() as $key => $val) {
            if(preg_match($pattern, $key)){
                $work_exper_certif[] = $val;
            }
        }
        $validateData['assessi_id'] = $assessi->id;
        $validateData['assessment'] = json_encode($assessment);
        $validateData['transcript'] = json_encode($transcript);
        $validateData['work_exper_certif'] = json_encode($work_exper_certif);
        $validateData['assessi_agreement'] = $request->assessi_agreement;
        $cek = $assessi->apl02;

        if ($cek == Null) {
            APL02Model::create($validateData);
        } else {
            $validateData['status'] = Null;
            $validateData['lane'] = Null;
            $validateData['note'] = Null;
            $validateData['assessor_agreement'] = Null;
            APL02Model::where('assessi_id', $assessi->id)
                ->update($validateData);
        }


        return redirect('/beranda')->with('toast_success', 'assessment berhasil di tambahkan!');
    }

    public function export($id)
    {
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi = $dataAssessi->assessis->find($id);
        //$assessi = AssessiModel::find(Auth::user()->id);
        //dd(json_decode($assessi->apl02->assessment));
        if (isset($assessi->apl02->assessment)) {
            $assessment = json_decode($assessi->apl02->assessment);
        } else {
            $assessment = [];
        }

        $print = PDF::loadview(
            'assessi.print_apl02',
            //Sdd($assessi->assessis->find($id)->apl01);
            [
                'title' => 'apl02',
                'asesi' => $assessi,
                'skema' => $assessi->schema_class->schema,
                'apl01' => $assessi->apl01,
                'asesor' => $assessi->assessor,
                'class' => $assessi->schema_class,
                'units' => $assessi->schema_class->schema->unit_schemas,
                'apl02' => $assessi->apl02,
                'assessment' => $assessment,

            ]
        );
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database

        //mendownload laporan.pdf
        return $print->download('assessi.print_apl02');
    }
}
