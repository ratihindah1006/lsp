<?php

namespace App\Http\Controllers;
use App\Models\AssessiModel;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class Apl01Controller extends Controller
{
    public function index()
    {
        $assessi=AssessiModel::find(Auth::user()->id);
        return view('assessi.apl01', [
            'title'=> 'APL 01'
        ]);
    }
}
