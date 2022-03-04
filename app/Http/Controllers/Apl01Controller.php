<?php

namespace App\Http\Controllers;

use App\Models\DataAssessiModel;
use App\Models\AssessiModel;
use App\Models\Apl01;
use App\Models\SchemaClassModel;
use App\Models\SchemaModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;

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
        //$posts = Post::where('user_id', $user->id)->get();
        //dd($assessi->assessis->find($id)->schema_class->schema);
       
        return view('assessi.apl01', [
            'title' => 'APL 01',
            'assessi'=>$data3,
            'assessis' => $assessi->assessis->find($id)->schema_class->schema,
            'apl01' => $assessi->assessis->find($id)->apl01,
        ]);
    }

    public function store($id, Request $request)
    {
        $assessi = DataAssessiModel::find(Auth::user()->id);

        $asesi = $assessi->assessis->find($id);
      

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
        $validateData['assessi_id'] = $asesi->id;
        //dd($validateData);
        $cek = $asesi->apl01;

        //dd($validateData);

        if ($cek == Null) {
            Apl01::create($validateData);
        } else {
            Apl01::where('assessi_id', $asesi->id)
                ->update($validateData);
        }

        return redirect('/beranda')->with('success', 'Apl01 Berhasil diinput');
    }
}
