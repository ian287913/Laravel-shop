<?php

namespace App\Http\Controllers\Api;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cart;
use Illuminate\Support\Facades\Log;
use phpDocumentor\Reflection\Types\Integer;

class CartController extends Controller
{
    public function show(){
        $carts = User::all()->where('id', auth('api')->user()->getAuthIdentifier())->find(1)
                ->carts->sortBy('created_at');
        $data = array();
        foreach ($carts as $cart){
            $data[] = [
                'id' => $cart->id,
                'product' => $cart->product,
                'quantity' => $cart->quantity,
            ];
        }
        return response()->json($data);
    }

    public function store(Request $request){
        $carts = User::all()->where('id', auth('api')->user()->getAuthIdentifier())->find(1)->carts;
        foreach ($carts as $cart){
            if($cart->product->id === $request->get(0)){
                $cart->update(['quantity' => $cart->quantity+1]);
                return response()->json(['success' => true]);
            }
        }

        $item = [
            'user_id' => auth('api')->user()->getAuthIdentifier(),
            'product_id' => $request->get(0),
            'quantity' => 1,
        ];
        Cart::create($item);
        return response()->json(['success' => true]);
    }

    public function update( Cart $item, Request $request){
        if($item->quantity === 1 && $request->get(0) === -1)
            return response()->json(['success' => false]);
        $item->update(['quantity' => $item->quantity + $request->get(0)]);
        return response()->json(['success' => true]);
    }

    public function destroy(Cart $item){
        $item->delete();
        return response()->json(['success' => true]);
    }

}
