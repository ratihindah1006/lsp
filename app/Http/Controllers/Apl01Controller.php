<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Apl01Controller extends Controller
{
    public function index()
    {
        return view('assessi.apl01', [
            'title'=> 'APL 01'
        ]);
    }
}
