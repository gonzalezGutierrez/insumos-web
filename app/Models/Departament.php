<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departament extends Model
{

    protected $fillable = ['area','responsable','status'];

    public function products()
    {
        return $this->hasMany(Product::class,'departament_id');
    }
    public function getById($id)
    {
        return $this->findOrFail($id);
    }
    public function getDepartaments($like)
    {
        if($like)
            return $this->search($like);
        return $this->where('status',0)->paginate(10);
    }
    public function search($like)
    {
        return $this->where('area','LIKE',"%{$like}%")->paginate(10);
    }
}
