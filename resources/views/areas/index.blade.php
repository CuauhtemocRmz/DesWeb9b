@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Areas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body ml-4 mr-4 mt-4 mb-4">
                
            
                        @can('crear-area')
                        <a class="btn btn-warning" href="{{ route('areas.create') }}">Nuevo</a>
                        @endcan
            
                        <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">                                     
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;width:10%">Nombre</th>
                                    <th style="color:#fff;width:15%">Descripcion</th>   
                                    <th style="color:#fff;width:10%">Duracion turno</th>                                                                   
                                    <th style="color:#fff;width:10%">Intervalo turno</th>                                                                   
                                    <th style="color:#fff;width:10%">Inicio jornada laboral</th>                                                                   
                                    <th style="color:#fff;width:10%">Inicio descanso</th>  
                                    <th style="color:#fff;width:10%">Fin descanso</th>                                                                   
                                    <th style="color:#fff;width:10%">Fin jornada laboral</th>                                                                   
                                    <th style="color:#fff;width:15%">Acciones</th>    
                                                                                                   
                              </thead>
                              <tbody>
                            @foreach ($areas as $area)
                            <tr>
                                <td style="display: none;">{{ $area->id }}</td>                                
                                <td>{{ $area->nombre }}</td>
                                <td>{{ $area->descripcion }}</td>
                                <td>{{ $area->duracion_turno }}</td>
                                <td>{{ $area->intervalo_turno }}</td>
                                <td>{{ $area->inicio_turno }}</td>
                                <td>{{ $area->inicio_descanso }}</td>
                                <td>{{ $area->fin_descanso }}</td>
                                <td>{{ $area->fin_turno }}</td>


                                <td>
                                    <form action="{{ route('areas.destroy', $area->id) }}" method="POST">                                        
                                        @can('editar-area')
                                        <a class="btn btn-info" href="{{ route('areas.edit',$area->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-area')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $areas->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
