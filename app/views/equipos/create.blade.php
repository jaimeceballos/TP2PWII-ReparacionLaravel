@extends('layouts.base')

@section('main')

<div class="row">
    <h1>Nuevo Equipo</h1>
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

{{ Form::open(array('route' => 'equipos.store', 'class' => 'form-horizontal')) }}

        <div class="form-group">
            <label>Tipo equipo</label>
              
              {{ Form::select('tipo_equipo_id',$tipoEquipo,null,['class'=>'form-control']) }}
        </div>

        <div class="form-group">
            <label>Propietario</label>
                {{ Form::select('cliente_id',$clientes,null,['class'=>'form-control']) }}  
        </div>

        <div class="form-group">
            <label>Descripcion</label>
            
              {{ Form::textarea('descripcion_equipo', null, array('class'=>'form-control', 'placeholder'=>'Descripcion_equipo')) }}
            
        </div>

        <div class="form-group">
            <label>Estado general</label>
            
              {{ Form::textarea('estado_general', null, array('class'=>'form-control', 'placeholder'=>'Estado_general')) }}
          
        </div>

        
        


        <a href="{{ URL::route('equipos.index') }}" class="btn btn-link">Cancelar</a>
      {{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-info pull-right')) }}
    
</div>

{{ Form::close() }}

@stop


