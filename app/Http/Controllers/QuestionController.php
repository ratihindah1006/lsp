<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SchemaModel;
use App\Models\CodeQuestion;
use App\Models\ElementModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use App\Http\Requests\StoreQuestionRequest;
use App\Http\Requests\UpdateQuestionRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SchemaModel $schema)
    {
        $data = [
            'title' => 'Soal Esai',
            'schemas' => $schema::all(),
        ];
        return view('admin.question.listQuestion', $data);
    }

    public function getUnit(Request $request){
        $unit = DB::table("unit")->where("schema_id", $request->schema_id)->pluck("unit_title", "id");
        return response()->json($unit);
    }

    public function getElement(Request $request){
        $element = DB::table("element")->where("unit_id", $request->unit_id)->pluck("element_title", "id");
        return response()->json($element);
    }    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SchemaModel $schema)
    {
        $data = [
            'title' => 'Soal Esai',
            'schemas' => $schema::all()
        ];
        
        return view('admin.question.createQuestion', $data);
    }

    public function createByCode(CodeQuestion $codeQuestion)
    {
        $data = [
            'title' => 'Soal Esai',
            'codeQuestion' => $codeQuestion,
        ];
        
        return view('admin.question.createQuestionByCode', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
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
            $img->setAttribute('style', 'width:500px;');
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
            $img->setAttribute('width', '500px');
            $img->setAttribute('class', 'img-fluid');
        }
  
        $pertanyaan = $dom->saveHTML();
        $jawaban = $dom2->saveHTML();

        $data = new Question([
            'unit_id' => $request->unit,
            'code_id' => $request->kode_soal,
            'no_soal' => $request->no_soal,
            'question' => $pertanyaan,
            'key_answer' => $jawaban,
        ]);
       
        $data->save();

        return redirect('soal/kodesoal/'.$request->kode_soal)->with('toast_success', 'Pertanyaan berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $data = [
            'title' => 'Soal Esai',
            'question' => $question,
            'schema' => $question->unit->schema,
        ];

        return view('admin.question.editQuestion', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQuestionRequest  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        $validateData = $request->validate([
            'question' => 'required',
            'key_answer' => 'required'
        ]);
        
        $oldQuestion = $question->question;
        $oldKeyAnswer = $question->key_answer;

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

        //upload
        $pertanyaan = $request->question;
        $jawaban = $request->key_answer;

        $dom = new \DomDocument();
        $dom2 = new \DomDocument();
  
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
            $img->setAttribute('style', 'width:500px;');
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
            $img->setAttribute('width', '500px');
            $img->setAttribute('class', 'img-fluid');
        }
  
        $pertanyaan = $dom->saveHTML();
        $jawaban = $dom2->saveHTML();

        $question->update([
            'question' => $pertanyaan,
            'key_answer' => $jawaban,
        ]);

        return redirect('soal/kodesoal/'.$question->code->id)->with('toast_success', 'Pertanyaan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $oldQuestion = $question->question;
        $oldKeyAnswer = $question->key_answer;

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
        $question->delete();

        return redirect('soal/kodesoal/'.$question->code->id)->with('toast_success', 'Pertanyaan berhasil dihapus!');
    }

    public function kodeSoal(Request $request)
    {
        $validateData = $request->validate([
            'schema' => 'required',
            'kode_soal' => 'required',
        ]);

        if (CodeQuestion::where('schema_id', $request->schema)->where('code_name', $request->kode_soal)->exists()) {
            return redirect('soal')->with('toast_error', 'Kode soal tidak boleh sama');
        }

        $data = new CodeQuestion([
            'schema_id' => $request->schema,
            'code_name' => $request->kode_soal,
        ]);      

        $data->save();

        return redirect('soal')->with('toast_success', 'Kode soal berhasil ditambah!');
    }

    public function listSoal(CodeQuestion $codeQuestion)
    {
        $data = [
            'title' => 'List Soal Esai',
            'questions' => Question::where('code_id', $codeQuestion->id)->get(),
            'codeQuestion' => $codeQuestion,
        ];
        
        return view('admin.question.listQuestionCode', $data);
    }
}
