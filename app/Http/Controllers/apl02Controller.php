<?php

namespace App\Http\Controllers;

use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;
use App\Models\APL02Model;
use App\Models\CriteriaModel;
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

    public function store(Request $request)
    {
        $criteria = CriteriaModel::get('id');

        $apl02 = new APL02Model([
            'assessment' => $request->$criteria ,
        ]);
        dd($apl02);
        $apl02->save();
        return redirect('/beranda')->with('success', 'assessment berhasil di tambahkan!');
    }
    
}
