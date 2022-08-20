<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Areas;

class AreasController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-area|crear-area|editar-area|borrar-area')->only('index');
         $this->middleware('permission:crear-area', ['only' => ['create','store']]);
         $this->middleware('permission:editar-area', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-area', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function index()
    {       
         //Con paginación
        $areas = Areas::paginate(5);
         return view('areas.index',compact('areas'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!!$areas->links() !!}    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('areas.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion_turno' =>'required',
            'intervalo_turno' => 'required',
            'inicio_turno' => 'required',
            'inicio_descanso' => 'required',
            'fin_descanso' => 'required',
            'fin_descanso' => 'required',

        ]);
    
        Areas::create($request->all());
    
        return redirect()->route('areas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Areas $area)
    {
        return view('areas.editar',compact('area'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Areas $area)
    {
         request()->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'duracion_turno' =>'required',
            'intervalo_turno' => 'required',
            'inicio_turno' => 'required',
            'inicio_descanso' => 'required',
            'fin_descanso' => 'required',
            'fin_descanso' => 'required',
        ]);
    
        $area->update($request->all());
    
        return redirect()->route('areas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Areas $area)
    {
        $area->delete();
    
        return redirect()->route('areas.index');
    }
}
