<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::where('stock','>',0)->where('status',0)->orderBy('id','desc')->get();
        return new ProductCollection($products);
    }

    public function show($id){
        $product = Product::findOrFail($id);
        return new ProductResource($product);
    }
}
