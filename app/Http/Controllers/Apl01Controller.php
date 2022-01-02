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

        $validateData = $request->validate([
            'nik' => 'required',
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
            'ijazah' => 'required|mimes:pdf|max:1024',
            'photo' => 'required|image|file|max:1024',
            'ktp' => 'required|mimes:pdf|max:1024',
            'transcript' => 'required|mimes:pdf|max:1024',
            'assessi_signature' => 'required|image|file|max:1024',
        ]);

        $validateData['photo'] = $request->file('photo')->store('photo');
        $validateData['ijazah'] = $request->file('ijazah')->store('ijazah');
        $validateData['ktp'] = $request->file('ktp')->store('ktp');
        $validateData['transcript'] = $request->file('transcript')->store('transcript');
        $validateData['assessi_signature'] = $request->file('assessi_signature')->store('assessi_signature');
        $validateData['assessi_id'] = $assessi->id;
        $cek = $assessi->apl01;
        //dd($validateData);

        if ($cek == Null) {
            Apl01::create($validateData);
        } else {
            Apl01::where('assessi_id', $assessi->id)
                ->update($validateData);
        }

        return redirect('/beranda')->with('success', 'Apl01 Berhasil diinput');
    }
}
