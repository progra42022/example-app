<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;
class Categoria extends Model
{
    use HasFactory;
    protected $table='categorias';

    public function productos(){
        return $this->hasMany(Producto::class, 'id_categoria', 'id');
    }
}
