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
            ]
        );
    }

    public function store(Request $request, SchemaModel $schema, $id)
    {
        //dd($request->all());
        //$assessi = AssessiModel::find(Auth::user()->id);
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi = $dataAssessi->assessis->find($id);
        $assessment = [];
        $i = 0;
        foreach ($request->all() as $data) {
            if ($i == 0 || $i == count($request->all())) {
                $i = $i + 1;
                continue;
            }
            $assessment[] = $data;
            $i = $i + 1;
        }
        $validateData['assessi_id'] = $assessi->id;
        $validateData['assessment'] = json_encode($assessment);
        $cek = $assessi->apl02;

        if ($cek == Null) {
            APL02Model::create($validateData);
        } else {
            $validateData['status'] = Null;
            $validateData['lane'] = Null;
            $validateData['note'] = Null;
            APL02Model::where('assessi_id', $assessi->id)
                ->update($validateData);
        }


        return redirect('/beranda')->with('toast_success', 'assessment berhasil di tambahkan!');
    }

    public function export( $id){
        $dataAssessi = DataAssessiModel::find(Auth::user()->id);
        $assessi = $dataAssessi->assessis->find($id);
        //$assessi = AssessiModel::find(Auth::user()->id);
        //dd(json_decode($assessi->apl02->assessment));
        if (isset($assessi->apl02->assessment)) {
            $assessment = json_decode($assessi->apl02->assessment);
        } else {
            $assessment = [];
        }    
       
        $print = PDF::loadview('assessi.print_apl02', 
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
            
        ]);
        //mengambil data dan tampilan dari halaman laporan_pdf
        //data di bawah ini bisa kalian ganti nantinya dengan data dari database
        
        //mendownload laporan.pdf
        return $print->download('assessi.print_apl02');
    	
    }
}
