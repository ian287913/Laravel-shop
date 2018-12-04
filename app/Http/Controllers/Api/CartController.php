<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use App\Product;

class CartController extends Controller
{
    public function show(){
        $cart = Cart::orderBy('created_at', 'asc')->get();
        return response()->json($cart);
    }

    public function store(Product $product){
        $item = [
            'product_id' => $product->id,
            'img' => $product->img,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => 1,
        ];
        Cart::create($item);
    }

    public function update(Request $request, Cart $item){
        $item->update(['quantity' => $request->get('quantity')]);
    }

    public function destroy(Cart $item){
        $item->delete();
    }

}
