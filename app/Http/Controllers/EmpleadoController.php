<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //indicar el objeto de datos a trabajar
        $datos['empleado']=Empleado::paginate(20);
        return view('empleado.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$DatosEmpleado= request()->all();
        $DatosEmpleado=request()->except('_token'); //Excluye el token para mostrar en el navegador
        if($request->hasFile('Foto')){ //Guardamos en una ruta la imagen como img
            $DatosEmpleado['Foto']=$request->file('Foto')->store('uploads','public');
        }
        Empleado::insert($DatosEmpleado); //Guarda los datos en la tabla Empleado de la BD
        //return response()->json($DatosEmpleado);  //Retorna los datos ingresados al formulario al presionar el boton
        return redirect('empleado')->with('mensaje','Empleado agregado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $empleado=Empleado::findOrFail($id);
            return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $DatosEmpleado=request()->except(['_token', '_method']); //Excluye el token para mostrar en el navegador
        if($request->hasFile('Foto')){
            $empleado=Empleado::findOrFail($id);
            Storage::delete('public/'.$empleado->Foto);
            $DatosEmpleado['Foto']=$request->file('Foto')->store('uploads', 'public');
        }

        Empleado::where('id','=',$id)->update($DatosEmpleado);
        $empleado=Empleado::findOrFail($id);
            return view('empleado.edit',compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $empleado=Empleado::findOrFail($id);
        if(Storage::delete('public/'.$empleado->Foto)){
            Empleado::destroy($id);
        }
        //return redirect('empleado');
        return redirect('empleado')->with('mensaje','Empleado borrado con éxito.');
    }
}
