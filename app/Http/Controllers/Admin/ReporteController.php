<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Entrega;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteController extends Controller
{
    public function index() {
        return view('admin.reports.index');
    }

    public function reporteInsumo() {
        $products = Product::orderBy('stock','asc')->get();
        $pdf = \PDF::loadView('insumos', compact('products'));
        return $pdf->download('archivo.pdf');

    }

    public function reporteIEntregas() {
        $entregas = Entrega::all();
        $pdf = \PDF::loadView('entregas', compact('entregas'));
        return $pdf->download('entrega.pdf');
    }
}
