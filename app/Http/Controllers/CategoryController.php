<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index (Request $request){

        $categories = Category::all();

        return view('dashboard.dashboard_category.dashboard_category_index', ['categories' => $categories]);
    }

    public function add(){

        return view('dashboard.dashboard_category.dashboard_category_add');

    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
    ]);

    $category = new Category($request->all());
    $category->save();

    // dd($category); // Debugging line

    return redirect()->route('dashboard_category_index')->with(['success' => 'Data Berhasil Disimpan!']);
}

public function update(Request $request, $slug)
{
    $request->validate([
        'name' => 'required|unique:categories|max:255',
    ]);

    $category = Category::where('slug', $slug)->first();
    $category->update($request->all());

    dd($category); // Debugging line

    return redirect()->route('dashboard_category_index')->with(['success' => 'Data Berhasil Disimpan!']);
}



    public function edit($slug){
        $category = Category::where('slug', $slug)->first();
        return view('dashboard.dashboard_category.dashboard_category_edit', ['category' => $category]);
    }

    public function destroy(string $id)
    {
        Category::findOrFail($id)->delete();

        return redirect()->route('dashboard_category_index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
