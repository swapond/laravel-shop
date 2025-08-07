<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function index(Request $request){
        $query = Product::with('category');
        if ($request->category) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        $products = $query->paginate(12);
        $categories = Category::all();
        return view('store.index', compact('products', 'categories'));
    }






    public function show($slug){
        $product = Product::where('slug', $slug)->with('category')->firstOrFail();
        return view('store.show', compact('product'));
    }





    //
}
