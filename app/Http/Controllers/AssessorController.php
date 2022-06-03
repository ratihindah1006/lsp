<?php

namespace App\Http\Controllers;

use App\Models\AK01;
use App\Models\IA07;
use App\Models\Apl01;
use App\Models\MUK01;
use App\Models\MUK06;
use App\Models\Answer;
use PDF; //library pdf
use App\Models\Praktik;
use App\Models\APL02Model;
use App\Models\EventModel;
use App\Models\AnswerLisan;
use App\Models\SchemaModel;
use App\Models\AssessiModel;
use Illuminate\Http\Request;
use App\Models\AssessorModel;
use App\Models\DataAssessorModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException as ValidationException;
use Svg\Tag\Rect;

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
    public function edit_password()
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        return view('assessor.edit_password', [
            'title' => 'Ubah Password',
            'data_assessor' => $data_assessor,
        ]);
    }

    public function unit($id)
    {
        $schema = SchemaModel::find($id);
        return view('assessor.Unit', [
            'title' => 'Unit',
            'unit' => $schema->unit_schemas,
        ]);
    }

    public function assessi($id)
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $assessor) {
            
                return view('assessor.assessi', [
                    'title' => 'Assessi',
                    'assessi' => $assessor::find($id)->assessis,
                ]);
            
        }
    }

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect('/assessor')->with('toast_success', 'password berhasil di ubah');
        }
        throw ValidationException::withMessages([
            'current_password' => 'Password yang ada masukkan salah'
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

    public function apl01($id)
    {
        $asesi = AssessiModel::find($id);
        $id_assessor = $asesi->assessor_id;

        if ($asesi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            foreach ($a->assessis as $b) {
                $assessi = $b::find($id);
            }
        }
        return view('assessor.apl01', [
            'apl01' => $assessi->apl01,
            'assessi' => $assessi,
            'title' => 'APL-01',
            'category' => $assessi->schema_class->schema->category,
            'assessis' => $assessi->schema_class->schema,
            'assessor_id' => $assessi->assessor_id,
        ]);
    }

    public function download_ijazah(Request $request)
    {
        $id = $request->id;
        $apl01 = Apl01::find($id);
        $file = $apl01->ijazah;
        $path = public_path('storage/' . $file);
        return response()->download($path);
    }
    public function download_ktp(Request $request)
    {
        $id = $request->id;
        $apl01 = Apl01::find($id);
        $file = $apl01->ktp;
        $path = public_path('storage/' . $file);
        return response()->download($path);
    }
    public function download_transcript(Request $request)
    {
        $id = $request->id;
        $apl01 = Apl01::find($id);
        $file = $apl01->transcript;
        $path = public_path('storage/' . $file);
        return response()->download($path);
    }
    public function download_photo(Request $request)
    {
        $id = $request->id;
        $apl01 = Apl01::find($id);
        $file = $apl01->photo;
        $path = public_path('storage/' . $file);
        return response()->download($path);
    }
    public function download_work(Request $request)
    {
        try {
            $id = $request->id;
            $apl01 = Apl01::find($id);
            $file = $apl01->work_exper_certif;
            $path = public_path('storage/' . $file);
            return response()->download($path);
        } catch (\Throwable $th) {
            return redirect()->back()->with('toast_error', 'File tidak ditemukan');
        }
       
    }



    public function apl02($id)
    {
        $asesi = AssessiModel::find($id);
        $id_assessor = $asesi->assessor_id;

        if ($asesi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }
        
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        $assessment = [];
        foreach ($data_assessor->assessors as $a) {
            $assessor = $a;
            foreach ($a->assessis as $b) {
                $assessi = $b::find($id);
                if (isset($assessi->apl02->assessment)) {
                    $assessment = json_decode($assessi->apl02->assessment);
                }
            }
        }
        return view('assessor.apl02', [
            'title' => 'APL02',
            'assessi' => $assessi,
            'skema' => $assessi->schema_class->schema,
            'asesor' => $assessor,
            'apl01' => $assessi->apl01,
            'class' => $assessi->schema_class,
            'units' => $assessi->schema_class->schema->unit_schemas,
            'apl02' => $assessi->apl02,
            'assessment' => $assessment,
        ]);
    }
   
    public function export_apl01($id)
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            foreach ($a->assessis as $b) {
                $assessi = $b::find($id);
                $print = PDF::loadview(
                    'assessor.print_apl01',
                    [
                        'apl01' => $assessi->apl01,
                        'assessi' => $assessi,
                        'title' => 'Skema',
                        'assessis' => $assessi->schema_class->schema,
                    ]
                );
                return $print->download('assessor.print_apl01');
            }
        }
      
    }
    public function export($id)
    {
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            $assessor = $a;
            foreach ($a->assessis as $b) {
                $assessi = $b::find($id);
                if (isset($assessi->apl02->assessment)) {
                    $assessment = json_decode($assessi->apl02->assessment);
                } else {
                    $assessment = [];
                }
                $print = PDF::loadview('assessor.print_apl02', [
                    'title' => 'APL02',
                    'assessi' => $assessi,
                    'skema' => $assessi->schema_class->schema,
                    'asesor' => $assessor,
                    'apl01' => $assessi->apl01,
                    'class' => $assessi->schema_class,
                    'units' => $assessi->schema_class->schema->unit_schemas,
                    'apl02' => $assessi->apl02,
                    'assessment' => $assessment,

                ]);
                return $print->download('assessor.print_apl02');
            }
        }
    }

    public function status_apl01(Request $request, Apl01 $apl01, $id)
    {
        $request->assessor_agreement == "on" ? $request->assessor_agreement = 1 : $request->assessor_agreement = 0;
        $data_assessor = DataAssessorModel::find(Auth::user()->id);
        foreach ($data_assessor->assessors as $a) {
            foreach ($a->assessis as $b) {
                $assessi = $b->find($id);
                if ($assessi->apl01 != null) {
                    $validateData = $request->validate([
                        'status' => 'required',
                    ]);
                    $validateData['note'] = $request->note;
                    $validateData['assessor_agreement'] =  $request->assessor_agreement;
                    $validateData['assessi_id'] = $assessi->id;
                    $assessi->apl01->update($validateData);
                   
                }
            }
        }
        
        $assessor = $assessi->assessor_id;
        return redirect('/assessi/'.$assessor)->with('toast_success', 'Status berhasil di Update!');
        
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
                    ]);
                    $validateData['lane'] = $request->lane;
                    $validateData['note'] = $request->note;
                    $validateData['assessi_id'] = $assessi->id;
                    $assessi->apl02->update($validateData);
                }
            }
        }
        $assessor = $assessi->assessor_id;
        return redirect('/assessi/'.$assessor)->with('toast_success', 'Status berhasil di Update!');
    }

    public function ak01(AssessiModel $assessi)
    {
        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $id_assessor = $assessi->assessor_id;
        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data = [
            'ak01' => $assessi->ak01,
            'title' => 'AK01',
            'event_start' => $assessi->schema_class->date,
            'assessor' => Auth::user()->name,
            'assessi' => $assessi,
            'schema' => $assessi->schema_class->schema,
            'assessor_id' => $assessi->assessor_id,
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
        $request->assessi_agreement == "on" ? $request->assessi_agreement = 1 : $request->assessi_agreement = 0;
        $request->assessor_agreement == "on" ? $request->assessor_agreement = 1 : $request->assessor_agreement = 0;
        $data = [
            'tl_verif_porto' => $request->tl_verif_porto,
            't_p_tulis' => $request->t_p_tulis,
            't_p_lisan' => $request->t_p_lisan,
            't_p_wawancara' => $request->t_p_wawancara,
            'l_obs_langsung' => $request->l_obs_langsung,
            'tuk' => $request->tuk,
            'assessi_agreement' => $request->assessi_agreement,
            'assessor_agreement' => $request->assessor_agreement,
        ];

        AK01::updateOrCreate(
            ['assessi_id' => $request->assessiId],
            $data
        );

        $assessi = AssessiModel::where('id', $request->assessiId)->first();

        return redirect('/assessi/'.$assessi->assessor_id)->with('toast_success', 'Form AK01 berhasil di Update!');
    }

    public function muk01(AssessiModel $assessi)
    {
        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $id_assessor = $assessi->assessor_id;
        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data = [
            'title' => 'MUK01',
            'assessi' => $assessi,
            'assessor' => $assessi->assessor->data_assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'assessor_id' => $assessi->assessor_id,
        ];

        return view('assessor.muk01', $data);
    }

    public function updMUK01(Request $request)
    {
        $request->assessi_agreement == "on" ? $request->assessi_agreement = 1 : $request->assessi_agreement = 0;
        $request->assessor_agreement == "on" ? $request->assessor_agreement = 1 : $request->assessor_agreement = 0;
        $data = [
            'assessi_id' => $request->assessiId,
            'rekomendasi' => $request->rekomendasi,
            'assessi_agreement' => $request->assessi_agreement,
            'assessor_agreement' => $request->assessor_agreement,
        ];
        MUK01::updateOrCreate(
            ['assessi_id' => $request->assessiId],
            $data
        );

        $assessi = AssessiModel::where('id', $request->assessiId)->first();

        return redirect('/assessi/'.$assessi->assessor_id)->with('toast_success', 'Form MUK01 berhasil di Update!');
    }

    public function muk06(AssessiModel $assessi)
    {
        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $id_assessor = $assessi->assessor_id;
        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if (!$assessi->ak01) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form AK01 belum dibuat');
        }

        if(isset($assessi->ak01) && ($assessi->ak01->t_p_tulis != 1)){
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form AK01 pertanyaan tulis belum diceklist');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        if ((isset($assessi->muk06) && ($assessi->muk06->assessi_agreement != 1)) || (!$assessi->muk06)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Assessi belum mengupload jawaban soal esai');
        }
     
        $answer = Answer::all()->where('assessi_id', $assessi->id);
        
        $data = [
            'title' => 'MUK06',
            'assessi' => $assessi,
            'assessor' => $assessi->assessor->data_assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'answer' => $answer,
            'assessor_id' => $assessi->assessor_id,
        ];
        return view('assessor.muk06', $data);
    }

    public function saveMUK06(Request $request)
    {
        $rekomendasi = null;
        if ($request->rekomendasi) {
            foreach ($request->rekomendasi as $key => $value) {
                if ($request->rekomendasi[$key] == "K") {
                    $rekomendasi = 1;
                } else if ($request->rekomendasi[$key] == "BK") {
                    $rekomendasi = 0;
                } else {
                    $rekomendasi = null;
                }
                $data = array(
                    'rekomendasi' => $rekomendasi
                );

                Answer::updateOrCreate(
                    ['assessi_id' => $request->assessiId, 'unit_id' => $request->unitId[$key], 'code_id' => $request->codeId[$key]],
                    $data
                );
            }
        }

        $request->assessor_agreement == "on" ? $request->assessor_agreement = 1 : $request->assessor_agreement = 0;
        $agreement = array(
            'assessor_agreement' => $request->assessor_agreement,
        );

        MUK06::updateOrCreate(
            ['assessi_id' => $request->assessiId],    
            $agreement
        );

        $assessi = AssessiModel::where('id', $request->assessiId)->first();

        return redirect('/assessi/'.$assessi->assessor_id)->with('toast_success', 'Form MUK06 berhasil disimpan!');
    }

    public function muk07(AssessiModel $assessi)
    {
        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $id_assessor = $assessi->assessor_id;
        if (!$assessi->apl02) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if (!$assessi->ak01) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form AK01 belum dibuat');
        }

        if(isset($assessi->ak01) && ($assessi->ak01->t_p_lisan != 1)){
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form AK01 pertanyaan lisan belum diceklist');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }
        
        $answer = AnswerLisan::all()->where('assessi_id', $assessi->id);
        $data = [
            'title' => 'MUK07',
            'assessi' => $assessi,
            'assessor' => $assessi->assessor->data_assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'answer' => $answer,
            'assessor_id' => $assessi->assessor_id,
        ];
        return view('assessor.muk07', $data);
    }

    public function saveMUK07(Request $request)
    {
        $rekomendasi = null;
        if ($request->rekomendasi) {
            foreach ($request->rekomendasi as $key => $value) {
                if ($request->rekomendasi[$key] == "K") {
                    $rekomendasi = 1;
                } else if ($request->rekomendasi[$key] == "BK") {
                    $rekomendasi = 0;
                } else {
                    $rekomendasi = null;
                }
                $data = array(
                    'rekomendasi' => $rekomendasi
                );

                AnswerLisan::updateOrCreate(
                    ['assessi_id' => $request->assessiId, 'unit_id' => $request->unitId[$key], 'code_lisan_id' => $request->codeId],
                    $data
                );
            }
        }
        
        if ($request->answer) {
            foreach ($request->answer as $key => $value) {
                $jawaban = $request->answer[$key];
                if ($jawaban != null) {
                    $dom = new \DomDocument();
    
                    libxml_use_internal_errors(true);
                    $dom->loadHtml($jawaban, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
                    
                    $images = $dom->getElementsByTagName('img');
              
                    foreach($images as $img){
                        $data = $img->getAttribute('src');
                        if (strpos($data, 'data') !== false) {
                            list($type, $data) = array_pad(explode(';', $data),2,null); 
                            list(, $data) = array_pad(explode(',', $data),2,null); 
                            $data = base64_decode($data);
                            File::ensureDirectoryExists(public_path('storage').'/upload');
                            $image_name= "/upload/" . time().uniqid().'.png';
                            $path = public_path('storage') . $image_name;
                            file_put_contents($path, $data);
                            $img->removeAttribute('src');
                            $img->removeAttribute('style');
                            $img->setAttribute('src', asset('/storage'.$image_name));
                            // $img->setAttribute('style', 'max-width:500px;');
                            $img->setAttribute('class', 'img-fluid');
                        }
                    }
              
                    $jawaban = $dom->saveHTML();
                }

                $dataJawaban = array(
                    'answer' => $jawaban, 
                );
                
                AnswerLisan::updateOrCreate(
                    ['assessi_id' => $request->assessiId, 'unit_id' => $request->unitId[$key], 'code_lisan_id' => $request->codeId],
                    $dataJawaban
                );
            }            
        }

        $request->assessi_agreement == "on" ? $request->assessi_agreement = 1 : $request->assessi_agreement = 0;
        $request->assessor_agreement == "on" ? $request->assessor_agreement = 1 : $request->assessor_agreement = 0;
        $agreement = array(
            'assessi_agreement' => $request->assessi_agreement,
            'assessor_agreement' => $request->assessor_agreement,
        );

        IA07::updateOrCreate(
            ['assessi_id' => $request->assessiId],    
            $agreement
        );

        $assessi = AssessiModel::where('id', $request->assessiId)->first();

        return redirect('/assessi/'.$assessi->assessor_id)->with('toast_success', 'FORM IA.07 berhasil ditambahkan');
    }

    public function listJawabanAssessi(AssessiModel $assessi)
    {
        $id_assessor = $assessi->assessor_id;

        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $data = [
            'title' => 'Tugas Demonstrasi Praktik',
            'assessi' => $assessi,
            'schema_class' => $assessi->schema_class,
            'code' => $assessi->schema_class->code_praktik,
            'schema' => $assessi->schema_class->schema,
            'bukti' => $assessi->praktik,
            'assessor_id' => $assessi->assessor_id,
        ];

        return view('assessor.list_jawaban_assessi', $data);
    }

    public function downloadFile(Praktik $praktik) 
    {
        $file = public_path('storage/' . $praktik->file_path);
        $name = basename($file);
        return response()->download($file, $name);
    }
    
    public function updateListJawaban(Request $request)
    {
        $rekomendasi = null;
        if ($request->catatan) {
            foreach ($request->catatan as $key => $value) {
                Praktik::find($key)->update([
                    'rekomendasi' => $request->rekomendasi[$key] ?? null,
                    'catatan' => $request->catatan[$key],
                ]);
            }
        }
        return redirect('/assessor')->with('toast_success', 'Penilaian berhasil disimpan!');
    }

    public function ia02(AssessiModel $assessi)
    {
        $data_assessor = AssessorModel::where('data_assessor_id', Auth::user()->id)->where('class_id', $assessi->schema_class->id)->first();
        if (!$data_assessor) {
            return redirect('/');
        }else if ($assessi->assessor_id != $data_assessor->id) {
            return redirect('/');
        }

        $id_assessor = $assessi->assessor_id;

        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/assessi/'.$id_assessor)->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data = [
            'title' => 'FR.IA.02',
            'assessi' => $assessi,
            'assessor' => $assessi->assessor->data_assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'instruksi' => $assessi->schema_class->code_praktik->soal_praktik
        ];

        return view('assessor.soal_praktik', $data);
    }
}
