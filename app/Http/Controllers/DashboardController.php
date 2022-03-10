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
<<<<<<< HEAD
        $assessi = DB::table('assessi')->count();
        $assessor = DB::table('assessor')->count();
=======
        $assessi = DB::table('data_assessi')->count();
        $assessor = DB::table('data_assessor')->count();
>>>>>>> 830ef3a9e7ee9b9ab19d910440d9f398b42da94d
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