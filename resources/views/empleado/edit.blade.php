Aqui se mostrara el formulario de edicion
@extends('layouts.app')

@section('content')
<div class="container">
<br>
<form action="{{url('/empleado/'.$empleado->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{@method_field('PATCH')}}
@include('empleado.form',['modo'=>'Editar'])

</form>
</div>
@endsection