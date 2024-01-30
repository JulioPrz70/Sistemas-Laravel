<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Crear Usuario
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <label for="Nombre" class="col-md-4 col-form-label text-md-rigth">
                        Nombre
                    </label>
                    <div class="col-md-6">
                        <input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<label for="Nombre">Nombre
    <input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}">
</label>
<br>
<label for="ApellidoPaterno">Apellido Paterno
    <input type="text" name="ApellidoPaterno" id="ApellidoPaterno" value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:''}}">
</label>
<br>
<label for="ApellidoMaterno">Apellido Materno
    <input type="text" name="ApellidoMaterno" id="ApellidoMaterno" value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:''}}">
</label>
<br>
<label for="Correo">Correo
    <input type="text" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}">
</label>
<br>
<label for="Telefono">Telefono
    <input type="text" name="Telefono" id="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:''}}">
</label>
<br>
<label for="Foto">Foto
    <br>
    @if(isset($empleado->Foto))
    <img src="{{asset('storage').'/'.$empleado->Foto}}" alt="" width="150px" height="100px">
    @endif
    <br>
    <input type="file" name="Foto" id="Foto" value="{{isset($empleado->Foto)?$empleado->Foto:''}}">
</label>
<br>
<input type="submit" value="{{$modo}} Datos">
<br>
<a href="{{url('empleado/')}}">Regresar</a>