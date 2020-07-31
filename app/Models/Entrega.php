<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entrega extends Model
{

    protected $fillable = ['user_id','departament_id','estatus'];

    public function departamento()
    {
        return $this->belongsTo(Departament::class,'departament_id');
    }

    public function productos($idEntrega)
    {
        return ProductoEntrega::join('products','producto_entregas.product_id','products.id')
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
    }

    public static function  getOrCreateDelivery($entrega)
    {
        if($entrega) {
            return Entrega::findOrFail($entrega);
        }
        return Entrega::create();
    }
}
