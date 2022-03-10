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
        $assessi = DB::table('assessi')->count();
        $assessor = DB::table('assessor')->count();
        $event = DB::table('event')->count();
        $category = DB::table('category')->count();
        return view('admin.dashboard.dashboard', [
            'assessor' => $assessor,
            'assessi'=> $assessi,
            'event'=>$event,
            'category'=> $category,
            'title'=> 'Dashboard',
         
        ]);
    }

}