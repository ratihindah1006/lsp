<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use App\Models\Apl01;
use App\Models\APL02Model;
use App\Models\SchemaClassModel;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Null_;

class Apl01Controller extends Controller
{
    public function index( $id)
    {
        
        $data = DataAssessiModel::find(Auth::user()->id);
        $data3=$data->assessis->find($id);
        $assessi = DataAssessiModel::find(Auth::user()->id);    

        return view('assessi.apl01', [
            'title' => 'APL 01',
            'assessi'=>$data3,
            'assessis' => $assessi->assessis->find($id)->schema_class->schema,
            'category' => $assessi->assessis->find($id)->schema_class->schema->category,
            'apl01' => $assessi->assessis->find($id)->apl01,
        ]);
    }

    public function store($id, Request $request)
    {
        $assessi = DataAssessiModel::find(Auth::user()->id);
        $asesi = $assessi->assessis->find($id);

        $rules = [
            'nik' => 'required|regex:/[0-9]{16}/',
            'name' => 'required|regex:/^[A-Za-z ]+$/',
            'domicile' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required|regex:/^08[0-9]{9,11}$/',
            'last_education' => 'required',
            'job_title' => 'required',
            'sert_schema' => 'required',
            'assessment_purpose' => 'required',
        ];

        $cek = $asesi->apl01;
       
        if(!$cek){
            $rules['ijazah'] = 'required|file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['photo'] = 'required|file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['ktp'] = 'required|file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['transcript'] = 'required|file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['work_exper_certif'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['assessi_signature'] = 'required|file|image|mimes:jpeg,png,jpg|max:1024';
        }else{
            $rules['ijazah'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['photo'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['ktp'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['transcript'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['work_exper_certif'] = 'file|mimes:pdf,jpg,png,jpeg|max:1024';
            $rules['assessi_signature'] = 'file|image|mimes:jpeg,png,jpg|max:1024';
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
        $validateData['comp_name'] = $request->comp_name;
        $validateData['position'] = $request->position;
        $validateData['comp_address'] = $request->comp_address;
        $validateData['comp_telp'] = $request->comp_telp;
        $validateData['comp_email'] = $request->comp_email;
        $validateData['comp_fax'] = $request->comp_fax;
        $validateData['postal_code'] = $request->postal_code;
      

        if ($cek == Null) {
            Apl01::create($validateData);
            return redirect('/beranda')->with('toast_success', 'Apl01 Berhasil diinput');
        } else {
            $validateData['status'] = Null;
            $validateData['note'] = Null;
            $validateData['assessor_signature'] = Null;
            Apl01::where('assessi_id', $asesi->id)
                ->update($validateData);
            APL02Model::whereAssessiId($asesi->id)->delete();
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
