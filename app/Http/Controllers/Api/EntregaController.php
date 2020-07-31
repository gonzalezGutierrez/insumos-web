<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use App\Models\Product;
use App\Models\ProductoEntrega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EntregaController extends Controller
{
    public function show($idEntrega)
    {

        $entrega = Entrega::findOrFail($idEntrega);

        $productos = ProductoEntrega::join('products','producto_entregas.product_id','products.id')
            ->groupBy('products.id')
            ->select(
                'products.id',
                'products.name',
                DB::raw(
                    'sum(producto_entregas.cantidad) as cantidad'
                ),
                'products.image'
            )->where('producto_entregas.entrega_id',$idEntrega)
            ->get();

        return $productos;
    }
    public function store(Request $request)
    {
        try {

            //crear entrega estatus en terminado
            DB::beginTransaction();
            $products = $request->all()['products'];

            $entrega = Entrega::create([
                'user_id'=>$request->user_id,
                'departament_id'=>$request->departament_id,
                'estatus'=>'terminado'
            ]);



            foreach($products as $product){

                $productSave = Product::findOrFail($product['productId']);

                $productEntrega = new ProductoEntrega();

                $productEntrega->product_id = $productSave->id;
                $productEntrega->cantidad = $product['amount'];
                $productEntrega->entrega_id = $entrega->id;
                $productEntrega->save();

                $productSave->stock -= $product['amount'];
                $productSave->save();

            }

            DB::commit();

            return response()->json(['message'=>'Sincronización correcta'],201);

        } catch (\Exception $th) {
            DB::rollback();
            return "error: ".$th->getMessage();
        }

    }
}
