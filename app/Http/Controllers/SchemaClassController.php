<?php

namespace App\Http\Controllers;
use App\Models\AdminModel;
use App\Models\EventModel;
use App\Models\CodePraktik;
use App\Models\SchemaModel;
use App\Models\CodeQuestion;
use Illuminate\Http\Request;
use App\Models\AssessorModel;

use App\Models\SchemaClassModel;
use App\Models\CodeQuestionLisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Testing\Fakes\EventFake;



class SchemaClassController extends Controller
{
    public function index(AdminModel $admin, EventModel $event)
    {
        return view('admin.schema_class.listSchemaClass', [
            'admin'=>$admin->where('id', Auth::user()->id)->get(),
            'event'=> $event->event_code,
            'class' => SchemaClassModel::all(),
            'assessor' => AssessorModel::all(),
            'title' => 'Kelas Skema',      ]);
    }

    public function create(EventModel $event)
    {
        return view('admin.schema_class.createSchemaClass', [
            'event' => DB::table('event')->get(),
            'schema' => DB::table('schema')->get(),
            'title'=> 'Tambah Kelas Skema',
        ]);
    }


    public function getKode(Request $request){
        $code = DB::table("code_question")->where("schema_id", $request->schema_id)->pluck("code_name", "id");
        return response()->json($code);
    }

    public function getKodeLisan(Request $request){
        $code_lisan = DB::table("code_question_lisan")->where("schema_id", $request->schema_id)->pluck("code_lisan_name", "id");
        return response()->json($code_lisan);
    }

    public function getKodePraktik(Request $request){
        $code_praktik = DB::table("code_praktik")->where("schema_id", $request->schema_id)->pluck("code_praktik_name", "id");
        return response()->json($code_praktik);
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|unique:schema_class',
            'tuk' => 'required',
            'date' => 'required',
            'description' => 'required',
            'event_id' => 'required',
            'schema_id' => 'required',
            'code_id' => 'required',
            'code_lisan_id' => 'required',
            'code_praktik_id' => 'required',
        ]);
      
        $eventTime = EventModel::find($request->event_id);
        if(!$this->isValidDate($request->date, $eventTime->event_time)){
            return back()->with('toast_error', 'Tanggal tidak valid!')->withInput($request->all());
        }
      
        $class = new SchemaClassModel([
            'name' => $request->name,
            'tuk' => $request->tuk,
            'date' => $request->date,
            'description' => $request->description,
            'event_id' =>  $request->event_id,
            'schema_id' =>  $request->schema_id,
            'code_id' => $request->code_id,
            'code_lisan_id' => $request->code_lisan_id,
            'code_praktik_id' => $request->code_praktik_id,
        ]);
        $class->save();
        return redirect('/KelasSkema')->with('toast_success', 'Data kelas Skema berhasil di tambahkan!');
    }

    public function edit(SchemaClassModel $class)
    {
        return view('admin.schema_class.editSchemaClass',[
            'event' => EventModel::all(),
            'schema' => SchemaModel::all(),
            'codes' => CodeQuestion::all(),
            'codes_lisan' => CodeQuestionLisan::all(),
            'codes_praktik' => CodePraktik::all(),
            'title'=> 'Data Kelas Skema',
            'class'=> $class,
        ]);
    }

    public function update(Request $request, SchemaClassModel $class)
    {
        $rules=[
            'tuk' => 'required',
            'description' => 'required',
            'event_id' => 'required',
            'schema_id' => 'required',
            'date' => 'required',
            'code_id' => 'required',
            'code_lisan_id' => 'required',
            'code_praktik_id' => 'required',
        ];
        $eventTime = EventModel::find($request->event_id);
        if(!$this->isValidDate($request->date, $eventTime->event_time)){
            return back()->with('toast_error', 'Tanggal tidak valid!')->withInput($request->all());
        }
        if($request->name != $class->name){
            $rules['name'] = 'required|unique:schema_class';
        }
        $validateData= $request->validate($rules);
        $class->update($validateData);
        return redirect('/KelasSkema')->with('toast_success', 'Data Kelas Skema berhasil di Update!');
        
    }

    public function detail(SchemaClassModel $class){
        return view('admin.schema_class.detailSchemaClass',[
            'event' => EventModel::all(),
            'schema' => SchemaModel::all(),
            'title'=> 'Data Kelas Skema',
            'class'=> $class,
        ]);
    }

    public function destroy(SchemaClassModel $class)
    {
        SchemaClassModel::destroy($class->id);
        return redirect('/KelasSkema')->with('toast_success', 'Data Kelas Skema berhasil di hapus!');
    }

    private function isValidDate($date, $validDate)
    {   

        $date = strtotime($date);
        $validDate1 = strtotime(explode(" - ", $validDate)[0]);
        $validDate2 = strtotime(explode(" - ", $validDate)[1]);
        
        return $date <= $validDate2 && $date >= $validDate1;
    }
}
