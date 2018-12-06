<?php

namespace App\Http\Controllers\api;

use App\Product;
use App\Review;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    public function show(Product $product){
        $reviews = $product->reviews->sortBy('created_at');;
        return response()->json($reviews);
    }

    public function store(Request $request){
        Review::create($request->all());
        return response()->json(['success' => true]);
    }

}
