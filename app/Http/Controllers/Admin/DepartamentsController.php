<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartamentRequest;
use App\Http\Resources\DepartamentoResource;
use App\Models\Departament;
use App\Models\Product;
use Illuminate\Http\Request;

class DepartamentsController extends Controller
{

    public function index(Request $request)
    {
        $like = $request->like;
        $departament = new Departament();
        $departaments = $departament->getDepartaments($like);
        return  view('admin.departaments.index',['departaments'=>$departaments,'like'=>$like]);
    }

    public function products(Request $request,$departamentId)
    {
        $like  = $request->like;
        $departament = Departament::findOrFail($departamentId);
        $product     = new Product();
        $products    = $product->getProducts($like)->where('departament_id',$departamentId)->paginate(5);
        return view('admin.departaments.products',['departament'=>$departament,'products'=>$products,'like'=>$like]);
    }

    public function create()
    {
        return view('admin.departaments.create',['departament'=> new Departament()]);
    }

    public function store(DepartamentRequest $request)
    {
        try {
            Departament::create($request->all());
            alert()->success('La información fue guardada correctamente','Registro Exitoso');
            return redirect('departamentos');
        }catch (\Exception $e){

        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.departaments.edit',['departament'=>Departament::findOrFail($id)]);
    }

    public function update(Request $request, $id, Departament $departament)
    {
        try {
            $departament->getById($id)->fill($request->all())->save();
            alert()->success('La información fue actualizada correctamente','Actualización Exitosa');
            return back();
        }catch (\Exception $e){

        }
    }

    public function destroy($id,Departament $departament)
    {
        try {
            $departament->getById($id)->fill(['status'=>1])->save();
            alert()->success('Info Message', 'Optional Title');
            return back();
        }catch (\Exception $e){

        }
    }
}
