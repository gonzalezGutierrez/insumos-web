<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Product extends Model
{

    protected $fillable = ['name','stock','description','image','compatibility','departament_id','status','min_stock'];

    public function departament()
    {
        return $this->belongsTo(Departament::class,'departament_id');
    }

    public function scopeGetProducts($query,$like){
        if($like)
            return $query->search($like);
        return $query->activos();
    }

    public function scopeGetFirstMinStock($query)
    {
        return $query->orderBy('stock','asc');
    }

    public function scopeSearch($query,$like)
    {
        return $query->activos()->where('name','LIKE',"%{$like}%");
    }

    public function scopeActivos($query)
    {
        return $query->where('status',0);
    }

    public function getByDepartament($departamentId)
    {
        return $this->where('departament_id',$departamentId);
    }

    public static function getProductsTop($descOrAsc){
        return DB::table('producto_entregas')
            ->join('products','producto_entregas.product_id','products.id')
            ->join('entregas','producto_entregas.entrega_id','entregas.id')
            ->join('departaments','entregas.departament_id','departaments.id')
            ->groupBy('products.id')
            ->select(
                'products.name as product',
                DB::raw('count(*) count_products_delivery')
            )
            ->orderBy('count_products_delivery',$descOrAsc)
            ->paginate(10);
    }


}
