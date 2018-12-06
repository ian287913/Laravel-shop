<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderBy('id', 'asc')->get();
        return ProductResource::collection($products);
    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function searchByName(string $searchKey)
    {
        $products = Product::orderBy('id', 'ASC')->where('name', 'like', '%'.$searchKey.'%')->get();

        return ProductResource::collection($products);
    }

    public function getTag(string $tag)
    {
        $products = Product::orderBy('id', 'ASC')->where('tags', 'like', '%'.$tag.'%')->get();

        return ProductResource::collection($products);
    }

    public function getPrice(string $mode)
    {
        $products = Product::orderBy('price', $mode)->get();

        return ProductResource::collection($products);
    }

    //未完成部分
    public function getSize(string $size)
    {
        $products = Product::orderBy('id', 'ASC')->get();
        return ProductResource::collection($products);
    }

    public function getBranch(string $branch_id)
    {
        $products = Product::orderBy('id', 'ASC')->where('category_id', $branch_id)->get();

        return ProductResource::collection($products);
    }

    public function getOS(string $os)
    {
        $products = Product::orderBy('id', 'ASC')->where('os_id', $os)->get();

        return ProductResource::collection($products);
    }


}
