@extends('layouts.base')

@section('main')
<h1>Editar una orden</h1>
<div class="row">
    <div class="col-md-10 col-md-offset-2">
        

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>


    <div class="col-md-4 column">       
       <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"><i>Orden N&uacute;mero {{ $orden->id }}</i></h3>
            </div>
            <div class="panel-body">
                <p class="text-muted"><strong class="text-info">Cliente:</strong> {{ $orden->cliente->persona->ape_nom }}</p>
                <p class="text-muted"><strong class="text-info">Falla:</strong> {{ $orden->descripcion_falla }}</p>
                <p class="text-muted"><strong class="text-info">Equipo/s:</strong> </p>
                <ul>
                @foreach($orden->equipos as $item)
                    <li class="text-muted">{{ $item->descripcion_equipo }}</li>
                @endforeach
                </ul>
                <p class="text-muted"><strong class="text-info">Fecha Ingreso:</strong> {{  date( "d/m/Y",strtotime($orden->fecha_entrada)) }}</p>
                <p class="text-muted"><strong class="text-info">Tipo Orden:</strong> {{  $orden->tipoOrden->descripcion }}</p>
            </div>
       </div>
        <a href="{{ URL::route('orden.index') }}" class="btn btn-link">Cancelar</a>
        @if($orden->tipoOrden->descripcion == 'reparacion')
        {{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-success pull-right')) }}
        @endif
    </div>
    <div class="col-md-8 column">
        <div class="jumbotron">
            @if($orden->tipoOrden->descripcion == 'reparacion')
                @include('orden.form_reparacion')
            @else
                @include('orden.form_presupuesto')
            @endif
        </div>
    </div>


@stop