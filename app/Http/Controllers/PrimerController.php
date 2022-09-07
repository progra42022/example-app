<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class PrimerController extends BaseController
{
    function index(){
        $contador = session('contador',0);
        $contador++;
        session(['contador'=>$contador]);

        $contadorCache = cache('contador',0);
        $contadorCache++;
        cache(['contador'=>$contadorCache]);

        return view('child', [
            'texto' => 'Hola Mundo', 
            'contador' => $contador, 
            'contadorCache' => $contadorCache,
        ]);
    }
    function show($texto){
        $contador = session('contador');
        if($contador == null){
            $contador = 0;
        }
        $contador++;
        session('contador',$contador);
        if($texto == "privado"){
            return redirect()->route('mi-controller', ['texto' => 'hola mundo', 'contador' => $contador]);
        }
        return view('mis-views.primer-view', [
            'texto' => $texto,
            'contador' => $contador
        ]);
    }
}
