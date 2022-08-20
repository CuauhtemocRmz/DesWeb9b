@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Area</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <div class="card-body ml-4 mr-4 mt-4 mb-4">
                   
                        @if ($errors->any())                                                
                            <div class="alert alert-dark alert-dismissible fade show" role="alert">
                            <strong>¡Revise los campos!</strong>                        
                                @foreach ($errors->all() as $error)                                    
                                    <span class="badge badge-danger">{{ $error }}</span>
                                @endforeach                        
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        @endif
                      

                    <form action="{{ route('areas.update',$area->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="row ">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" value="{{ $area->nombre }}">
                                    </div>
                                </div>

                               
                            </div>
                            <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-8">
                                    <div class="form-group">
                                        <label for="descripcion">Descripcion</label>
                                        <textarea rows="2" style="height:100%;" name="descripcion" class="form-control w-100" value=""> {{ $area->descripcion }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="duracion_turno">Duración turno</label>
                                        <input type="text" name="duracion_turno" class="form-control" value="{{ $area->duracion_turno }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="intervalo_turno">Intervalo</label>
                                        <input type="text" name="intervalo_turno" class="form-control" value="{{ $area->intervalo_turno }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="inicio_turno">Inicio turno laboral</label>
                                        <input type="text" name="inicio_turno" class="form-control" value="{{ $area->inicio_turno }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="inicio_descanso">Inicio descanso</label>
                                        <input type="text" name="inicio_descanso" class="form-control" value="{{ $area->inicio_descanso }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="fin_descanso">Fin decanso</label>
                                        <input type="text" name="fin_descanso" class="form-control" value="{{ $area->fin_descanso }}">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4">
                                    <div class="form-group">
                                        <label for="fin_turno">Fin turno laboral</label>
                                        <input type="text" name="fin_turno" class="form-control" value="{{ $area->fin_turno }}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 ">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>
                        </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
