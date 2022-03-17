<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminModel $admin)
    {
        $assessi = DB::table('data_assessi')->count();
        $assessor = DB::table('data_assessor')->count();
        $event = DB::table('event')->count();
        $class = DB::table('schema_class')->count();
        return view('admin.dashboard.dashboard', [
            'assessor' => $assessor,
            'assessi'=> $assessi,
            'event'=>$event,
            'class'=> $class,
            'title'=> 'Dashboard',
         
        ]);
    }

}