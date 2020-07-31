<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Departament;
use App\Models\HistoryAddProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsController extends Controller
{
    private $nameFile;

    public function index(Request $request)
    {
        $like = $request->like;
        $product = new Product();
        $products = $product->getProducts($like)->paginate(10);
        return view('admin.products.index',['like'=>$like,'products'=>$products]);
    }

    public function provideProduct(Request $request) {
        $like = $request->like;
        $product = new Product();
        $products = $product->getProducts($like)->getFirstMinStock()->paginate(15);
        return view('admin.products.provide',['like'=>$like,'products'=>$products]);
    }

    public function provideProductAndSave(Request $request) {
        DB::beginTransaction();
        try {

            HistoryAddProduct::create([
                'user_id'=>Auth::user()->id,
                'product_id'=>$request->product_id,
                'amount'=>$request->amount
            ]);
            $product = Product::findOrFail($request->product_id);
            $product->stock += $request->amount;
            $product->min_stock = intval($product->stock *.10);
            $product->save();
            DB::commit();
            return back();
        }catch (\Exception $e) {
            dd($e);
        }
    }

    public function create()
    {
        $departaments = Departament::all();
        return view('admin.products.create',['departaments'=>$departaments,'product'=> new Product()]);
    }

    public function store(Request $request)
    {
        try {
            if($request->hasFile('fileImage')){
                $file = $request->file('fileImage');
                $name = now()->format('y-m-d').'_'.rand(1,15000).'_image_product.png';
                \Storage::disk('local')->put('products/'.$name,\File::get($file));
                $request['image'] = 'images/products/'.$name;
            }

            $min_stock =intval($request->stock * .10);

            $request['min_stock'] = $min_stock;

            Product::create($request->all());

            return redirect('productos');
        }catch (\Exception $e) {
            return redirect('products');
        }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('admin.products.edit',['product'=>Product::findOrFail($id),'departaments'=>Departament::all()]);
    }

    public function update(Request $request, $id)
    {
        if($request->hasFile('fileImage')){
            $file = $request->file('fileImage');
            $name = now()->format('y-m-d').'_'.rand(1,15000).'_image_product.png';
            \Storage::disk('local')->put('products/'.$name,\File::get($file));
            $request['image'] = 'images/products/'.$name;
        }
        $product = Product::findOrFail($id);
        $product->fill($request->all())->save();
        alert()->success('La información fue guardada correctamente','Actualizació Exitosa');
        return back();
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->fill(['status'=>1])->save();
        return back();
    }

    public function comprobante($productId) {
        $product = Product::findOrFail($productId);
        return view('admin.products.comprobante',compact('product'));
    }
}
