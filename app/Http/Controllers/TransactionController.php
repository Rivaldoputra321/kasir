<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\DetailSale;

class TransactionController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        return  view('kasir.transaksi', compact('products'));
    }

    public function processTransaction(Request $request)
{
    // Create a new detail sale entry
    $detailSale = DetailSale::create([
        'product_id' => $request->product_id,
        'jumlah_product' =>  $request->jumlah_product,
        'subtotal' =>  $request->subtotal,
        'sales_id' =>  $request->sales_id,
    ]);

    // Find the product by its ID
    $product = Product::find($request->product_id);

    if ($product) {
        // Reduce the product stock by the amount specified in jumlah_product
        $product->stock -= $request->jumlah_product;
        $product->save();
    }

    // Calculate the subtotal for the transaction
    $subtotal = $product->harga * $detailSale->jumlah_product;

    return response()->json(['Success', 'subtotal' => $subtotal]);
}
}


