<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AssessiModel;
use App\Models\ElementModel;
use Illuminate\Http\Request;
use App\Models\DataAssessiModel;
use App\Models\DataAssessorModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException as ValidationException;
use PDF;

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
        if(isset($assessi->ak01) && ($assessi->ak01->t_p_tulis != 1)){
            return redirect('/')->with('toast_error', 'Form MUK06 belum disetujui oleh asesor');
        }

        $tanggal_berakhir = substr($assessi->schema_class->event->event_time, 13);
        if (date("m/d/Y") > $tanggal_berakhir) {
            return redirect('/')->with('toast_error', 'Event telah berakhir, data tidak dapat diupdate kembali');
        }

        $cekAssessi = $assessi->where('data_assessi_id', Auth::user()->id)->exists();
        if (!$cekAssessi) {
            return redirect('/');
        }

        $assessor = DataAssessorModel::find($assessi->assessor->data_assessor_id);
        $answer = Answer::all()->where('assessi_id', $assessi->id);
        $data = [
            'title' => 'assessi',
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
        if (count($request->answer) > 0) {
            foreach ($request->answer as $key => $value) {
                $data=array(
                    'assessi_id' => $request->assessiId[$key],
                    'unit_id' => $request->unitId[$key],
                    'answer' => $request->answer[$key], 
                    'code_id' => $request->codeId[$key],
                );
                
                Answer::updateOrCreate(
                    ['assessi_id' => $request->assessiId[$key], 'unit_id' => $request->unitId[$key]],
                    $data
                );
            }            
        }
        return redirect('/beranda')->with('toast_success', 'jawaban berhasil ditambahkan');
    }

}