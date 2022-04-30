<?php

namespace App\Http\Controllers;

use App\Models\SchemaModel;
use Illuminate\Http\Request;
use App\Models\PertanyaanLisan;
use App\Models\CodeQuestionLisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class PertanyaanLisanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchemaModel $schema)
    {
        $data = [
            'title' => 'Pertanyaan Lisan',
            'schemas' => $schema::all(),
        ];
        return view('admin.pertanyaan_lisan.listPertanyaanLisan', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SchemaModel $schema)
    {
        $data = [
            'title' => 'Pertanyaan Lisan',
            'schemas' => $schema::all()
        ];
        
        return view('admin.pertanyaan_lisan.createPertanyaanLisan', $data);
    }

    public function createByCode(CodeQuestionLisan $codeQuestionLisan)
    {
        $data = [
            'title' => 'Pertanyaan Lisan',
            'codeQuestionLisan' => $codeQuestionLisan,
        ];
        
        return view('admin.pertanyaan_lisan.createPertanyaanLisanByCode', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'unit' => 'required',
            'kode_soal' => 'required',
            'no_soal' => 'required',
            'question' => 'required',
            'key_answer' => 'required',
        ]);

        $pertanyaan = $request->question;
        $jawaban = $request->key_answer;

        $dom = new \DomDocument();
        $dom2 = new \DomDocument();
  
        libxml_use_internal_errors(true);

        $dom->loadHtml($pertanyaan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $dom2->loadHtml($jawaban, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
        $images = $dom->getElementsByTagName('img');
        $images2 = $dom2->getElementsByTagName('img');
  
        foreach($images as $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().uniqid().'.png';
            $path = public_path('storage') . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->removeAttribute('style');
            $img->setAttribute('src', asset('/storage'.$image_name));
            // $img->setAttribute('style', 'max-width:500px;');
            $img->setAttribute('class', 'img-fluid');
        }

        foreach($images2 as $img){
            $data = $img->getAttribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);
            $image_name= "/upload/" . time().uniqid().'.png';
            $path = public_path('storage') . $image_name;
            file_put_contents($path, $data);
            $img->removeAttribute('src');
            $img->removeAttribute('style');
            $img->setAttribute('src', asset('/storage'.$image_name));
            // $img->setAttribute('style', 'max-width:500px');
            $img->setAttribute('class', 'img-fluid');
        }
  
        $pertanyaan = $dom->saveHTML();
        $jawaban = $dom2->saveHTML();

        $data = new PertanyaanLisan([
            'unit_id' => $request->unit,
            'code_lisan_id' => $request->kode_soal,
            'no_soal' => $request->no_soal,
            'question' => $pertanyaan,
            'key_answer' => $jawaban,
        ]);
       
        $data->save();

        return redirect('soallisan/kodesoal/'.$request->kode_soal)->with('toast_success', 'Pertanyaan lisan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PertanyaanLisan  $pertanyaanLisan
     * @return \Illuminate\Http\Response
     */
    public function show(PertanyaanLisan $pertanyaanLisan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PertanyaanLisan  $pertanyaanLisan
     * @return \Illuminate\Http\Response
     */
    public function edit(PertanyaanLisan $pertanyaanLisan)
    {
        $data = [
            'title' => 'Pertanyaan Lisan',
            'question' => $pertanyaanLisan,
            'schema' => $pertanyaanLisan->unit->schema,
        ];

        return view('admin.pertanyaan_lisan.editPertanyaanLisan', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PertanyaanLisan  $pertanyaanLisan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PertanyaanLisan $pertanyaanLisan)
    {
        $validateData = $request->validate([
            'question' => 'required',
            'key_answer' => 'required'
        ]);
        
        $pertanyaan = $request->question;
        $jawaban = $request->key_answer;

        $dom = new \DomDocument();
        $dom2 = new \DomDocument();
  
        libxml_use_internal_errors(true);
        
        $dom->loadHtml($pertanyaan, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $dom2->loadHtml($jawaban, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        
        $images = $dom->getElementsByTagName('img');
        $images2 = $dom2->getElementsByTagName('img');

        foreach($images as $img){
            $data = $img->getAttribute('src');
            if (strpos($data, 'data') !== false) {
                list($type, $data) = array_pad(explode(';', $data),2,null); 
                list(, $data) = array_pad(explode(',', $data),2,null); 
                $data = base64_decode($data);
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

        foreach($images2 as $img){
            $data = $img->getAttribute('src');
            if (strpos($data, 'data') !== false) {
                list($type, $data) = array_pad(explode(';', $data),2,null); 
                list(, $data) = array_pad(explode(',', $data),2,null); 
                $data = base64_decode($data);
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
  
        $pertanyaan = $dom->saveHTML();
        $jawaban = $dom2->saveHTML();

        $pertanyaanLisan->update([
            'question' => $pertanyaan,
            'key_answer' => $jawaban,
        ]);

        return redirect('soallisan/kodesoal/'.$pertanyaanLisan->code->id)->with('toast_success', 'Pertanyaan lisan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PertanyaanLisan  $pertanyaanLisan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PertanyaanLisan $pertanyaanLisan)
    {
        $oldQuestion = $pertanyaanLisan->question;
        $oldKeyAnswer = $pertanyaanLisan->key_answer;

        $oldDom = new \DomDocument();
        $oldDom2 = new \DomDocument();
        
        libxml_use_internal_errors(true);

        $oldDom->loadHtml($oldQuestion, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $oldDom2->loadHtml($oldKeyAnswer, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        
        $oldImages = $oldDom->getElementsByTagName('img');
        $oldImages2 = $oldDom2->getElementsByTagName('img');

        foreach($oldImages as $img){
            $data = $img->getAttribute('src');
            $path = parse_url($data);
            if (File::exists(public_path($path['path']))) {
                File::delete(public_path($path['path'])); 
            }
        }

        foreach($oldImages2 as $img){
            $data = $img->getAttribute('src');
            $path = parse_url($data);
            if (File::exists(public_path($path['path']))) {
                File::delete(public_path($path['path'])); 
            }
        }
        $pertanyaanLisan->delete();

        return redirect('soallisan/kodesoal/'.$pertanyaanLisan->code->id)->with('toast_success', 'Pertanyaan lisan berhasil dihapus!');
    }

    public function kodeSoal(Request $request)
    {
        $validateData = $request->validate([
            'schema' => 'required',
            'kode_soal' => 'required',
        ]);

        if (CodeQuestionLisan::where('schema_id', $request->schema)->where('code_lisan_name', $request->kode_soal)->exists()) {
            return redirect('soallisan')->with('toast_error', 'Kode soal tidak boleh sama');
        }

        $data = new CodeQuestionLisan([
            'schema_id' => $request->schema,
            'code_lisan_name' => $request->kode_soal,
        ]);      

        $data->save();

        return redirect('soallisan')->with('toast_success', 'Kode soal lisan berhasil ditambah!');
    }

    public function listSoal(CodeQuestionLisan $codeQuestionLisan)
    {
        $data = [
            'title' => 'List Soal Lisan',
            'questions' => PertanyaanLisan::where('code_lisan_id', $codeQuestionLisan->id)->get(),
            'codeQuestionLisan' => $codeQuestionLisan,
        ];
   
        return view('admin.pertanyaan_lisan.listPertanyaanLisanCode', $data);
    }
}
