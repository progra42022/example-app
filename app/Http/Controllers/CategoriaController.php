<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\DetalleCarrito;
use Illuminate\Support\Facades\Auth;


class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::all();
        return view('mis-views.categorias', ['categorias'=>$categorias]);
    }
    public function get($id){
        /*
        $categoria = Categoria::find($id);
        $productos = Producto::where('id_categoria', $id)->get();*/
        $userId = Auth::id();
        $categoria = Categoria::where('id', $id)->with('productos')->first();
        $cantidadDeProductos = [];
        $carrito = Carrito::obtenerCarrito($userId);
       foreach($categoria->productos as $producto){
            $detalle = DetalleCarrito::obtenerDetalle($carrito->id, $producto->id);
            $cantidadDeProductos[$producto->id] = $detalle->cantidad;
       }
        return view('mis-views.categoria', ['categoria'=>$categoria, 'cantidadDeProductos' => $cantidadDeProductos/*, 'productos' => $productos*/]);
    }
}
