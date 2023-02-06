@foreach($categorias as $categoria)
    <a href="categorias/{{$categoria->id}}">{{$categoria->nombre}}</a><br/>
@endforeach

@vite('resources/js/hello.js')