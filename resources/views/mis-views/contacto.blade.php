@extends('layouts.app')

@section('content')
    <h1> Formulario de Contacto </h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    {{ Form::open(array('method' => 'POST')) }}
        <label for="nombre">Nombre:</label> <input type="text" id="nombre" name="nombre" value="{{old('nombre')}}"><br/>
        <label for="email">Email:</label> <input type="text" id="email" name="email" value="{{old('email')}}"><br/>
        <input type="checkbox" id="publicidad" name="publicidad" @checked(old('publicidad'))><label for="publicidad">Recibir Publicidad</label>
        <label for="mensaje">Mensaje:</label> <br/>
        <textarea id="mensaje" name="mensaje"> {{old('mensaje')}}</textarea><br/>
        <input type="submit" value="Enviar"/>
    {{ Form::close() }}
    
@endsection