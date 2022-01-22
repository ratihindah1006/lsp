<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\APL02Model;
use App\Models\CriteriaModel;
use App\Models\SchemaModel;
use Illuminate\Http\Request;

class Apl02Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assessi = AssessiModel::find(Auth::user()->id);
        //dd(json_decode($assessi->apl02->assessment));
        if (isset($assessi->apl02->assessment)){
            $varr=json_decode($assessi->apl02->assessment);
        }
        else{
            $varr=[];
        }
        return view(
            'assessi.apl02',
            [
                'title' => 'apl02',
                'asesi' => $assessi,
                'skema' => $assessi->schema_class->schema,
                'apl01' => $assessi->apl01,
                'asesor' => $assessi->assessor,
                'class' => $assessi->schema_class,
                'units' => $assessi->schema_class->schema->units,
                'apl02' => $assessi->apl02,
                'assessment' => $varr,
            ]
        );
    }

    public function store(Request $request, SchemaModel $schema)
    {
        //dd($request->all());
        $assessi = AssessiModel::find(Auth::user()->id);
        $varriable = [];
        $i = 1;
        foreach ($request->all() as $basing){
            if($i==1 || $i==count($request->all())){
                $i=$i+1; continue;}
            $varriable[]=$basing;
        echo $basing;
        $i= $i+1;
        }
        //dd($varriable);
        $validateData = $request->validate([
            'note' => 'required',
        ]);
        $validateData['assessi_id'] = $assessi->id;
        $validateData['assessment'] = json_encode($varriable);
        $cek = $assessi->apl02;
        //dd($validateData);

        if ($cek == Null) {
            APL02Model::create($validateData);
        } else {
            APL02Model::where('assessi_id', $assessi->id)
                ->update($validateData);
        }

        
        return redirect('/beranda')->with('success', 'assessment berhasil di tambahkan!');
    }
    
}
