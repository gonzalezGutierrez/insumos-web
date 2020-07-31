<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResumenController extends Controller
{
    public function index(Request $request) {

        $productSelected = false;
        $topProdDesc = Product::getProductsTop('DESC');
        $topProdAsc  = Product::getProductsTop('ASC');

        /*$charDataProduct = DB::table('entregas')
            ->join('departaments','entregas.id','departaments.id')
            ->join('producto_entregas','entregas.id','producto_entregas.id')
            ->join('products','producto_entregas.product_id','products.id')
            ->groupBy('departaments.area')
            ->select('departaments.area',DB::raw('count(*) entregas'))
            ->where('products.id',$request->insumo_id)
            ->get();*/

        $charDataProduct =  DB::select('SELECT count(*) as entregas, departaments.area FROM entregas INNER JOIN departaments ON entregas.departament_id = departaments.id INNER JOIN producto_entregas ON entregas.id = producto_entregas.entrega_id INNER JOIN products ON producto_entregas.product_id = products.id where products.id = ? group by departaments.id order by entregas DESC',[$request->insumo_id]);
        
        //return $charDataProduct;

        $like = $request->like;
        $insumos = Product::getProducts($like)->orderBy('name','asc')->get();

        $insumoSelected = Product::first();
        $productSelected = true;

        if ($request->insumo_id) {
            $insumoSelected = Product::findOrFail($request->insumo_id);
        }

        return view('welcome',compact('topProdDesc','topProdAsc','productSelected','insumos','insumoSelected','charDataProduct','like'));
    }
}
