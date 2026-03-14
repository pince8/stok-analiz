<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Ürünleri listeleme
    public function index(){
        $products=Product::all();
        return view('products.index',compact('products'));
    }
    // Ürün ekleme formu
    public function create(){
        return view('products.create');
    }

    // Ürünü kaydetme
    public function store(Request $request){

        $request->validate([
            'name'=>'required',
            'price'=>'required|numeric',
            'stock'=>'required|integer'
        ]);

        Product::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla eklendi');
    }

    // Düzenleme sayfası
    public function edit(Product $product){

        return response()->json($product);
    }

    public function update(Request $request, Product $product){

        $product->update([
            'name'=> $request->name,
            'price'=>$request->price,
            'stock'=>$request->stock
        ]);

        return response()->json(['success'=>true]);
    }
    public function destroy(Product $product){
        $product->delete();

        return redirect()->route('products.index');
    }

    public function dashboard()
    {
        $totalProducts = Product::count();

        $criticalStock = Product::where('stock', '<', 10)->count();

        $totalValue = Product::sum(\DB::raw('price * stock'));

        $totalStock = Product::sum('stock');

        return view('dashboard.index', compact(
            'totalProducts',
            'criticalStock',
            'totalValue',
            'totalStock'
        ));
    }
}
