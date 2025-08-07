<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));

    }

    public function add($id)
    {
        $product = Product::findOrFail($id);
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        }else{
            $cart[$id] = [
                "name" => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);
        return back()->with('success', 'Product added to cart successfully!');

    }


    public function update(Request $request, $id){
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            $cart[$id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        }
        return back()->with('success', 'Cart updated successfully!');
    }

    public function remove( $id){
        $cart = session()->get('cart', []);
        if (isset($cart[$id])) {
            unset($cart[$id]);
        }
        session()->put('cart', $cart);
        return back()->with('success', 'Product removed successfully!');
    }

}
