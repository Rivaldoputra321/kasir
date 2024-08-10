<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('dashboard.dashboard_product.dashboard_product_index', [
            'products' => Product::all(),'categories' => $categories
        ]);

    }

    public function create()
    {

        $categories = Category::all();
        return view('dashboard.dashboard_product.dashboard_product_add', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        
        $validate = $request->validate([
            'name' => 'required|string|unique:products,name',
            'harga'=> 'required|int',
            'stok'=> 'required|int',
            
        ]);

        $product = Product::create($request->all());
        $product->categories()->sync([$request->categories]);
        return redirect()->route('dashboard_product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit($slug)
    {
        return view('dashboard.dashboard_product.dashboard_product_edit', [
            'product' => Product::where('slug', $slug)->firstOrFail(),'categories' => Category::all()
        ]);
    }

    public function update(Request $request, $slug)
    {

        $product = Product::where('slug', $slug)->firstOrFail();

        $request->validate([
            'name' => 'required|string|max:255|unique:products,name,' . $product->id,
            'harga' => 'required',
            'stok' => 'required',            
        ]);
    
       

        $product->slug = null;

        $product->update($request->all());

        $product->categories()->sync([$request->categories]);

        return redirect()->route('dashboard_product.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    

    /**
     * Update the specified resource in storage.
     */


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Product::findOrFail($id)->delete();

        return redirect()->route('dashboard_product.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
