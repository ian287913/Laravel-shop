<?php

namespace App\Http\Controllers;

use App\Category;
use App\OperationSystem;
use App\Product;
use App\SizeType;
use App\Tag;
use Illuminate\Http\Request;
use function MongoDB\BSON\toJSON;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::orderby('id', 'ASC')->get();

        $data = [
            'products' => $products,
        ];

        return view('products.index', $data);
    }

    public function create()
    {
        $categories = Category::all();
        $OS = OperationSystem::all();
        $Tags = Tag::all();
        $SizeType = SizeType::all();

        $data = [
            'categories' => $categories,
            'OS' => $OS,
            'Tags' => $Tags,
            'SizeType' => $SizeType,
        ];

        return view('products.create', $data);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required|integer',
            'size'=>'required',
            'cpu'=>'required',
            'gpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'description'=>'required',
            'img'=>'required|image',
        ]);

        $tagString = '';
        foreach ($_POST["tags"] as $value){
            $tagString = $tagString.' '.$value;
        }
        $request['tags'] = $tagString;

        $product = Product::create($request->all());

        if($request->hasFile('img')){
            $request->file('img')->store('public/images');
            $name = $request->file('img')->hashName();
            $product->update(['img' => 'storage/images/' . $name]);
        }

        return redirect()->route('products.index');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        $OS = OperationSystem::all();
        $Tags = Tag::all();
        $SizeType = SizeType::all();

        $data = [
            'product' => $product,
            'categories' => $categories,
            'OS' => $OS,
            'Tags' => $Tags,
            'SizeType' => $SizeType,
        ];

        return view('products.edit', $data);
    }

    public function update(Request $request,Product $product)
    {
        $this->validate($request, [
            'name'=>'required',
            'price'=>'required|integer',
            'size'=>'required',
            'cpu'=>'required',
            'gpu'=>'required',
            'ram'=>'required',
            'storage'=>'required',
            'description'=>'required',
        ]);

        $tagString = '';
        foreach ($_POST["tags"] as $value){
            $tagString = $tagString.' '.$value;
        }
        $request['tags'] = $tagString;

        $product->update($request->all());

        if($request->hasFile('img')){
            $request->file('img')->store('public/images');
            $name = $request->file('img')->hashName();
            $product->update(['img' => 'storage/images/' . $name]);
        }

        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index');
    }
}
