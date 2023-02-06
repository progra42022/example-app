<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\Carrito;
use App\Models\DetalleCarrito;


use Illuminate\Support\Facades\Auth;
class CarritoController extends Controller
{
    public function agregar($id){
        $producto = Producto::find($id);
        $userId = Auth::id();
        $carrito = Carrito::obtenerCarrito($userId);
        $idCarrito = $carrito->id;        
        $detalle = DetalleCarrito::obtenerDetalle($idCarrito, $id, 0);
        $detalle->cantidad = $detalle->cantidad +1;
        $detalle->save();
        return redirect('/categorias/' . $producto->id_categoria);
    }
    public function eliminar($id){
        $producto = Producto::find($id);
        $userId = Auth::id();
        $carrito = Carrito::obtenerCarrito($userId);
        $idCarrito = $carrito->id;        
        $detalle = DetalleCarrito::obtenerDetalle($idCarrito, $id);
        $detalle->cantidad = $detalle->cantidad -1;
        if($detalle->cantidad <=0){
            //$detalle->delete();
            DetalleCarrito::destroy($detalle->id);
        }else{
            $detalle->save();
        }
        
        return redirect('/categorias/' . $producto->id_categoria);
    }

    
    
}
?>