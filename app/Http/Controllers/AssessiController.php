<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\MUK06;
use App\Models\Answer;
use App\Models\Praktik;
use App\Models\AssessiModel;
use App\Models\ElementModel;
use Illuminate\Http\Request;
use App\Models\DataAssessiModel;
use App\Models\DataAssessorModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationException;

class AssessiController extends Controller
{

    public function index(DataAssessiModel $data_assessi)
    {
        $data_assessi = DataAssessiModel::find(Auth::user()->id);
        return view('assessi.assessiDashboard', [
            'title' => 'assessi',
            'assessi' => $data_assessi,
            'assessis' => $data_assessi->assessis,
        ]);       
    }

    public function edit_password()
    {
        $data_assessi = DataAssessiModel::find(Auth::user()->id);
        return view('assessi.edit_password',[
            'title' => 'Ubah Password',
            'data_assessi'=>$data_assessi,
        ]);
    }

    

    public function update_password(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)){
            auth()->user()->update(['password' => bcrypt($request->password)]);
            return redirect('/beranda')->with('toast_success', 'password berhasil di ubah');
        }
        throw ValidationException::withMessages([
            'current_password'=> 'Password yang ada masukkan salah'
        ]);
    }

    public function muk06(AssessiModel $assessi)
    {
        $cekAssessi = AssessiModel::where('data_assessi_id', Auth::user()->id)->where('id', $assessi->id)->exists();
        if (!$cekAssessi) {
            return redirect('/');
        }

        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/beranda')->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->t_p_tulis != 1)){
            return redirect('/beranda')->with('toast_error', 'Form MUK06 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/beranda')->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $assessor = DataAssessorModel::find($assessi->assessor->data_assessor_id);
        $answer = Answer::all()->where('assessi_id', $assessi->id);
        $data = [
            'title' => 'MUK06',
            'assessi' => $assessi,
            'assessor' => $assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'answer' => $answer
        ];

        return view('assessi.muk06', $data);
    }

    public function saveMUK06(Request $request, AssessiModel $assessi)
    {
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
                    'assessi_id' => $request->assessiId,
                    'unit_id' => $request->unitId[$key],
                    'answer' => $jawaban, 
                    'code_id' => $request->codeId[$key],
                );
                
                Answer::updateOrCreate(
                    ['assessi_id' => $request->assessiId, 'unit_id' => $request->unitId[$key]],
                    $dataJawaban
                );
            }            
        }

        $request->assessi_agreement == "on" ? $request->assessi_agreement = 1 : $request->assessi_agreement = 0;
        $agreement = array(
            'assessi_agreement' => $request->assessi_agreement,
        );

        MUK06::updateOrCreate(
            ['assessi_id' => $request->assessiId],    
            $agreement
        );

        return redirect('/beranda')->with('toast_success', 'jawaban berhasil ditambahkan');
    }

    public function ia02(AssessiModel $assessi)
    {
        $cekAssessi = AssessiModel::where('data_assessi_id', Auth::user()->id)->where('id', $assessi->id)->exists();
        if (!$cekAssessi) {
            return redirect('/');
        }

        if ((!$assessi->apl02) || ($assessi->apl02 && $assessi->apl02->status != 1)) {
            return redirect('/beranda')->with('toast_error', 'Form APL01/APL02 belum diterima');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/beranda')->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/beranda')->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $assessor = DataAssessorModel::find($assessi->assessor->data_assessor_id);
        $data = [
            'title' => 'FR.IA.02',
            'assessi' => $assessi,
            'assessor' => $assessor,
            'schema_class' => $assessi->schema_class,
            'schema' => $assessi->schema_class->schema,
            'instruksi' => $assessi->schema_class->code_praktik->soal_praktik
        ];

        return view('assessi.soal_praktik', $data);
    }

    public function soalPraktik(AssessiModel $assessi)
    {
        $cekAssessi = AssessiModel::where('data_assessi_id', Auth::user()->id)->where('id', $assessi->id)->exists();
        if (!$cekAssessi) {
            return redirect('/');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/beranda')->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/beranda')->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data = [
            'title' => 'Tugas Demonstrasi Praktik',
            'assessi' => $assessi,
            'schema_class' => $assessi->schema_class,
            'code' => $assessi->schema_class->code_praktik,
            'schema' => $assessi->schema_class->schema,
            'bukti' => $assessi->praktik,
        ];

        return view('assessi.list_upload', $data);
    }

    public function jawabanPraktik(AssessiModel $assessi)
    {
        $cekAssessi = AssessiModel::where('data_assessi_id', Auth::user()->id)->where('id', $assessi->id)->exists();
        if (!$cekAssessi) {
            return redirect('/');
        }

        if(!isset($assessi->ak01) || (isset($assessi->ak01) && $assessi->ak01->l_obs_langsung != 1)){
            return redirect('/beranda')->with('toast_error', 'Form IA.02 belum disetujui oleh asesor');
        }

        if ($assessi->schema_class->event->status == "Close") {
            return redirect('/beranda')->with('toast_error', 'Event telah ditutup, data tidak dapat diupdate kembali');
        }

        $data = [
            'title' => 'Upload Jawaban Soal Praktik',
            'assessi' => $assessi->id,
            'code' => $assessi->schema_class->code_praktik_id,
        ];

        return view('assessi.upload_jawaban', $data);
    }

    public function uploadJawabanPraktik(Request $request)
    {
        $validatedData = $request->validate([
            'file_jawaban' => 'required|max:2048|mimes:jpg,jpeg,png,pdf,doc,docx,pptx,ppt,xls,xlsx,zip,rar',
        ]);
    
        $name = $request->file('file_jawaban')->getClientOriginalName();

        $path = $request->file('file_jawaban')->store('jawaban');
    
        $data = new Praktik([
            'assessi_id' => $request->assessiId,
            'code_praktik_id' => $request->codeId,
            'file_name' => $name,
            'file_path' => $path,
            'keterangan' => $request->keterangan,
        ]);      

        $data->save();

        return redirect('/assessi/soalpraktik/'.$request->assessiId)->with('toast_success', 'Jawaban berhasil diupload!');
    }

    public function downloadFile(Praktik $praktik) 
    {
        $file = public_path('storage/' . $praktik->file_path);
        $name = basename($file);
        return response()->download($file, $name);
    }

    public function deleteFileBukti(Praktik $praktik)
    {
        if (File::exists(public_path('storage/' . $praktik->file_path))) {
            File::delete(public_path(('storage/' . $praktik->file_path))); 
        }

        $praktik->delete();

        return redirect('/assessi/soalpraktik/'.$praktik->assessi->id)->with('toast_success', 'File berhasil dihapus!');
    }

}