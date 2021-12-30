<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use App\Models\Apl01;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Null_;

class Apl01Controller extends Controller
{
    public function index()
    {
        $assessi = AssessiModel::find(Auth::user()->id);
        //dd($assessi->schema);
        return view('assessi.apl01', [
            'title' => 'APL 01',
            'assessis' => $assessi->schema,
            'apl01' => $assessi->apl01,
        ]);
    }

    public function store(Request $request, Apl01 $apl01)
    {
        $assessi = AssessiModel::find(Auth::user()->id);
        // dd($assessi->id);
       $validateData = $request->validate([
            'nik' => 'required|unique:apl01s',
            'name' => 'required',
            'domicile' => 'required',
            'place_of_birth' => 'required',
            'date_of_birth' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'address' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'last_education' => 'required',
            'comp_name' => 'required',
            'position' => 'required',
            'job_title' => 'required',
            'comp_address' => 'required',
            'comp_telp' => 'required',
            'comp_email' => 'required',
            'comp_fax' => 'required',
            'postal_code' => 'required',
            'sert_schema' => 'required',
            'assessment_purpose' => 'required',
            // 'ijazah' => 'required',
            // 'photo' => 'required|mimes:jpg',
            // 'ktp' => 'required|mimes:pdf',
            // 'transcript' => 'required|mimes:pdf',
        ]);
        // $photos = $request->file('photo');
        // $photoName = $photos->getClientOriginalName();
        // $apl01 = new Apl01([
        //     'assessi_id' => $assessi->id,
        //     'nik' => $request->nik,
        //     'name' => $request->name,
        //     'domicile' => $request->domicile,
        //     'place_of_birth' => $request->place_of_birth,
        //     'date_of_birth' => $request->date_of_birth,
        //     'gender' => $request->gender,
        //     'nationality' => $request->nationality,
        //     'address' => $request->address,
        //     'email' => $request->email,
        //     'no_hp' => $request->no_hp,
        //     'last_education' => $request->last_education,
        //     'comp_name' => $request->comp_name,
        //     'comp_telp' => $request->comp_telp,
        //     'position' => $request->position,
        //     'job_title' => $request->job_title,
        //     'comp_address' => $request->comp_address,
        //     'comp_email' => $request->comp_email,
        //     'comp_fax' => $request->comp_fax,
        //     'postal_code' => $request->postal_code,
        //     'sert_schema' => $request->sert_schema,
        //     'assessment_purpose' => $request->assessment_purpose,
        //     'ijazah' => $request->ijazah,
        //     'photo' => $photoName,
        //     'ktp' => $request->ktp,
        //     'transcript' => $request->transcript,
        //     'assessor_signature' => $request->assessor_signature,
        //     'assessi_signature' => $request->assessi_signature,
        //     'work_exper_certif' => $request->work_exper_certif,
        //     'note' => $request->note,
        // ]);
        // dd($apl01);
        $validateData['assessi_id']=$assessi->id;
        $cek = $assessi->apl01;
        //dd($validateData);
       
        if($cek==Null){
            Apl01::create($validateData);
        }else{
            Apl01::where('assessi_id', $assessi->id)
            ->update($validateData);
        }
        
        return redirect('/beranda')->with('success', 'Apl01 Berhasil diinput');
    }
  
}
