<html>
    <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">

    </head>
    <body>
    <h1>{{$categoria->nombre}}</h1>
@foreach($categoria->productos as $producto)
    <a href="/producto/{{$producto->id}}">{{$producto->nombre}}</a>&nbsp;&nbsp;&nbsp;
    @auth
        {{$cantidadDeProductos[$producto->id]}}
        @if($cantidadDeProductos[$producto->id]>0)
            
            <a href="/carrito/agregar/{{$producto->id}}"><button>
                    <i class="bi bi-cart-plus-fill"></i>
                </button></a>
            <a href="/carrito/eliminar/{{$producto->id}}"><button>-</button></a>
        @else
            <a href="/carrito/agregar/{{$producto->id}}"><button>
                <i class="bi bi-cart-plus"></i>
            </button></a>
        @endif

    @endauth
    <br/>
@endforeach
    </body>
</html>
