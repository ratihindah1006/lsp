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

        return view(
            'assessi.apl02',
            [
                'title' => 'apl02',
                'assessis' => $assessi->schema->units,
            ]
        );
    }

    public function store(Request $request, SchemaModel $schema)
    {
        $criteria = $schema->with(["units", "units.elements", "units.elements.criterias"]);


        $apl02 = new APL02Model([
            'assessment' => $request->$criteria ,
        ]);
        dd($apl02);
        $apl02->save();
        return redirect('/beranda')->with('success', 'assessment berhasil di tambahkan!');
    }
    
}
