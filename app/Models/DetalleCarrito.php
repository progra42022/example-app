<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCarrito extends Model
{
    use HasFactory;
    protected $table="detalles_carritos";

    static function obtenerDetalle($idCarrito, $idProducto, $cantidadPorDefecto = -1){
        $detalle = DetalleCarrito::where('id_carrito', $idCarrito)->where('id_producto', $idProducto)->first();
        if($detalle == null){
            $detalle = new DetalleCarrito();
            $detalle->id_carrito = $idCarrito;
            $detalle->id_producto = $idProducto;
            if($cantidadPorDefecto != -1){
                $detalle->cantidad = $cantidadPorDefecto;
                $detalle->save();
            }
        }
        return $detalle;
    }
}
