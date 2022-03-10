<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\SchemaModel;
use Illuminate\Support\Facades\DB;
use App\Models\ElementModel;
use Illuminate\Http\Request;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQuestionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionRequest $request)
    {
        $validateData = $request->validate([
            'element' => 'unique:question,element_id|required',
            'question' => 'required',
            'key_answer' => 'required'
        ]);

        $data = new Question([
            'element_id' => $request->element,
            'question' => $request->question,
            'key_answer' => $request->key_answer,
        ]);
       
        $data->save();

        return redirect('soal')->with('success', 'Pertanyaan berhasil di tambahkan!');
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
    public function edit(ElementModel $element)
    {
        if ($element->question == null) {
            return redirect('soal/create');
        }
        $data = [
            'title' => 'Soal Esai',
            'element' => $element,
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

        $question->update($validateData);

        return redirect('soal')->with('success', 'Pertanyaan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->delete();

        return redirect('soal')->with('success', 'Pertanyaan berhasil dihapus!');
    }
}
