@extends('layouts.app')

@section('content')
<div class="container">
<br>

@if(Session::has('mensaje'))
    <h3>{{Session::get('mensaje')}}</h3>
@endif

<br>
<a href="{{url('empleado/create')}}" class="badge badge-success">Registrar nuevo empleado</a>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Correo</th>
            <th>Telefono</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleado as $empleado)
        <tr>
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>{{$empleado->Telefono}}</td>
            <td>
                <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="150px" height="100px">
            </td>
            <td> <a href="{{url('/empleado/'.$empleado->id.'/edit')}}">Actualizar</a>
                <form action="{{url('/empleado/'.$empleado->id)}}"
                    method="POST">
                    @csrf 
                    {{@method_field('DELETE')}}
                    <input type="submit" value="Borrar"
                    onclick="return confirm('Neta me quieres borrar?')">
                </form>
            </td>
        </tr>      
    @endforeach
    </tbody>
</table>
</div>
@endsection