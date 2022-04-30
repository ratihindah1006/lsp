<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\CategoryModel;
use App\Models\UnitModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(AdminModel $admin)
    {
        $data = $admin->where('id', Auth::user()->id)->get();
        return view('admin.category.ListCategory', [
            'category' => CategoryModel::all(),
            'unit' => UnitModel::all(),
            'title' => 'Category',
            'admin' => $data
        ]);
    }

    public function create()
    {
        return view('admin.category.CreateCategory', [
            'title' => 'Category'
        ]);
    }

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'category_title' => 'required',
            'jenis_standar' => 'required',
            'no_skkni' => 'required',
        ]);

        CategoryModel::create($validateData);

        return redirect('/category')->with('toast_success', 'Category berhasil di tambahkan!');
    }

    public function show(CategoryModel $categoryModel)
    {
        //
    }

    public function edit(CategoryModel $category)
    {
        return view('admin.category.EditCategory', [
            'category' => $category,
            'title' => 'Category'
        ]);
    }

    public function update(Request $request, CategoryModel $category)
    {
        $rules = [
            'category_title' => 'required',
            'jenis_standar' => 'required',
            'no_skkni' => 'required',
        ];
        
        $validateData = $request->validate($rules);
        $category->update($validateData);
        return redirect('/category')->with('toast_success', 'Category berhasil di Update!');
    }

    public function destroy(CategoryModel $category)
    {
        $category->delete();
        return redirect('/category')->with('toast_success', 'Category berhasil di hapus!');
    }
}
