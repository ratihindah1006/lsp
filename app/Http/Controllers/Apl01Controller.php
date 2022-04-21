<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use App\Models\SchemaClassModel;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class Apl01Controller extends Controller
{
    public function index(SchemaClassModel $schema_class, $id)
    {
        
        $data = DataAssessiModel::find(Auth::user()->id);
        $data3=$data->assessis->find($id);
        $assessi = DataAssessiModel::find(Auth::user()->id);    
        //dd($assessi->assessis->find($id)->schema_class->schema->category);

        return view('assessi.apl01', [
            'title' => 'APL 01',
            'assessi'=>$data3,
            'assessis' => $assessi->assessis->find($id)->schema_class->schema,
            //'unit_schema' => $assessi->assessis->find($id)->schema_class->schema->unit_schemas,
            'category' => $assessi->assessis->find($id)->schema_class->schema->category,
            'apl01' => $assessi->assessis->find($id)->apl01,
        ]);
    }

    public function store($id, Request $request)
    {
        $assessi = DataAssessiModel::find(Auth::user()->id);
        $asesi = $assessi->assessis->find($id);

        $rules = [
            'nik' => 'required|min:16|numeric',
            'name' => 'required',
            'domicile' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|min:11',
            'last_education' => 'required',
            'comp_name' => 'required',
            'position' => 'required',
            'job_title' => 'required',
            'comp_address' => 'required',
            'comp_telp' => 'required|min:10|numeric',
            'comp_email' => 'required',
            'comp_fax' => 'required|min:10|numeric',
            'postal_code' => 'required|min:5|numeric',
            'sert_schema' => 'required',
            'assessment_purpose' => 'required',
            
        ];

        $cek = $asesi->apl01;
        if(!$cek){
            $rules['ijazah'] = 'required|mimes:pdf|max:1024';
            $rules['photo'] = 'required|mimes:pdf|max:1024';
            $rules['ktp'] = 'required|mimes:pdf|max:1024';
            $rules['transcript'] = 'required|mimes:pdf|max:1024';
            $rules['assessi_signature'] = 'required|image|file|max:1024';
        }

        $validateData = $request->validate($rules);
        if($request->hasFile('ijazah')){ 
            $validateData['ijazah'] = $request->file('ijazah')->store('ijazah');
        }
        if($request->hasFile('photo')){ 
            $validateData['photo'] = $request->file('photo')->store('photo');
        }
        if($request->hasFile('ktp')){ 
            $validateData['ktp'] = $request->file('ktp')->store('ktp');
        }
        if($request->hasFile('transcript')){ 
            $validateData['transcript'] = $request->file('transcript')->store('transcript');
        }
        
        if($request->hasFile('work_exper_certif')){ 
            $validateData['work_exper_certif'] = $request->file('work_exper_certif')->store('work_exper_certif');
        }

        if($request->hasFile('assessi_signature')){ 
            $validateData['assessi_signature'] = $request->file('assessi_signature')->store('assessi_signature');
        }
       
        $validateData['assessi_id'] = $asesi->id;

        if ($cek == Null) {
            Apl01::create($validateData);
            return redirect('/beranda')->with('toast_success', 'Apl01 Berhasil diinput');
        } else {
            $validateData['status'] = Null;
            $validateData['note'] = Null;
            $validateData['assessor_signature'] = Null;
            Apl01::where('assessi_id', $asesi->id)
                ->update($validateData);
            return redirect('/beranda')->with('toast_success', 'Apl01 Berhasil diupdate');
        }

        
    }

    public function export( $id){
        $data = DataAssessiModel::find(Auth::user()->id);
        $data3=$data->assessis->find($id);
        $assessi = DataAssessiModel::find(Auth::user()->id);    
       
        $print = PDF::loadview('assessi.print_apl01', 
      
         [
            'title' => 'APL 01',
            'assessi'=>$data3,
            'assessis' => $assessi->assessis->find($id)->schema_class->schema,
            'apl01' => $assessi->assessis->find($id)->apl01,
            'category' => $assessi->assessis->find($id)->schema_class->schema->category,
            
        ]);
        
        return $print->download('assessi.print_apl01');
    	
    }
}
