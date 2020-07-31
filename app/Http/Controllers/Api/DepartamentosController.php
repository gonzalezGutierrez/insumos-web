<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DepartamentoCollection;
use App\Http\Resources\DepartamentoResource;
use App\Http\Resources\ProductCollection;
use App\Models\Departament;
use App\Models\Product;
use Illuminate\Http\Request;

class DepartamentosController extends Controller
{

    public function index()
    {
        $departaments = Departament::where('status',0)->orderBy('id','desc')->paginate(5);
        return response()->json($departaments);
    }

    public function products(Request $request,$departamentId)
    {
        $like  = $request->like;
        $departament = Departament::findOrFail($departamentId);
        $product     = new Product();
        $products    = $product->getProducts($like)->where('departament_id',$departamentId)->get();
        return new ProductCollection($products);
    }

    public function show($id)
    {
        $departament = Departament::findOrFail($id);
        return new DepartamentoResource($departament);
    }
}
