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
                'asesi' => $assessi,
                'skema' => $assessi->schema,
                'apl01' => $assessi->apl01,
                'asesor' => $assessi->assessor,
                'units' => $assessi->schema->units,
            ]
        );
    }

    public function store(Request $request, SchemaModel $schema)
    {
        $criteria = $schema->with(["units", "units.elements", "units.elements.criterias"]);
        $assessi = AssessiModel::find(Auth::user()->id);

        // foreach($criteria as $criterias)
        $invoice=APL02Model::all();
        $invoice->value='k';
        $invoice->create();
        
        return redirect('/beranda')->with('success', 'assessment berhasil di tambahkan!');
    }
    
}
