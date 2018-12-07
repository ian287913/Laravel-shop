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

    public function getSize(string $size)
    {
        $products = Product::orderBy('id', 'asc');
        if($size === '5') {
            $products = $products->where('size', '>=', 17)->get();
        }
        else if($size === '4') {
            $products = $products->whereBetween('size', array(15, 16.9))->get();
        }
        else if($size === '3') {
            $products = $products->whereBetween('size', array(14, 14.9))->get();
        }
        else if($size === '2') {
            $products = $products->whereBetween('size', array(13, 13.9))->get();
        }
        else if($size === '1'){
            $products = $products->whereBetween('size', array(11, 12.9))->get();
        }
        else{
            $products->get();
        }

        return ProductResource::collection($products);
    }

    public function getBrand(string $brand_id)
    {
        $products = Product::orderBy('id', 'ASC')->where('category_id', $brand_id)->get();

        return ProductResource::collection($products);
    }

    public function getOS(string $os)
    {
        $products = Product::orderBy('id', 'ASC')->where('os_id', $os)->get();

        return ProductResource::collection($products);
    }


}
