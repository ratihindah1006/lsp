<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\SchemaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(AdminModel $admin)
    {
        $data=$admin->where('id', Auth::user()->id)->get();
        return view('admin.category.ListCategory', [
            'category' => CategoryModel::all(),
            'schema' => SchemaModel::all(),
            'title'=> 'Category',
            'admin'=> $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.CreateCategory',[
            'title'=> 'Category'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validateData = $request->validate([
            'category_code' => 'required',
            'category_title' => 'required',
            'field_code' => 'required|unique:category',
            'field_title' => 'required',
        ]);
       
        CategoryModel::create($validateData);

        return redirect('/category')->with('success', 'Category berhasil di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryModel $categoryModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryModel $category)
    {
        return view('admin.category.EditCategory', [
            'category' => $category,
            'title'=> 'Category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoryModel $category)
    {
        $rules=[
            'category_title' => 'required',
            'category_code' => 'required',
            'field_title' => 'required',
        ];
        if($request->field_code != $category->field_code){
            $rules['field_code'] = 'required|unique:category';
        }
        $validateData= $request->validate($rules);
        $category->update($validateData);
        return redirect('/category')->with('success', 'Category berhasil di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CategoryModel  $categoryModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryModel $category)
    {
        $category->delete();
        return redirect('/category')->with('success', 'Category berhasil di hapus!');
    }
}