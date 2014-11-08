@extends('layouts.scaffold')

@section('main')

<div class="row">
    <div class="col-md-10 col-md-offset-2">
        <h1>Edit Equipo</h1>

        @if ($errors->any())
        	<div class="alert alert-danger">
        	    <ul>
                    {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                </ul>
        	</div>
        @endif
    </div>
</div>

{{ Form::model($equipo, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('equipos.update', $equipo->id))) }}

        <div class="form-group">
            {{ Form::label('tipo_equipo_id', 'Tipo_equipo_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('tipo_equipo_id', Input::old('tipo_equipo_id'), array('class'=>'form-control', 'placeholder'=>'Tipo_equipo_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('cliente_id', 'Cliente_id:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('cliente_id', Input::old('cliente_id'), array('class'=>'form-control', 'placeholder'=>'Cliente_id')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('descripcion_equipo', 'Descripcion_equipo:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('descripcion_equipo', Input::old('descripcion_equipo'), array('class'=>'form-control', 'placeholder'=>'Descripcion_equipo')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('estado_general', 'Estado_general:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::textarea('estado_general', Input::old('estado_general'), array('class'=>'form-control', 'placeholder'=>'Estado_general')) }}
            </div>
        </div>

        <div class="form-group">
            {{ Form::label('baja', 'Baja:', array('class'=>'col-md-2 control-label')) }}
            <div class="col-sm-10">
              {{ Form::text('baja', Input::old('baja'), array('class'=>'form-control', 'placeholder'=>'Baja')) }}
            </div>
        </div>


<div class="form-group">
    <label class="col-sm-2 control-label">&nbsp;</label>
    <div class="col-sm-10">
      {{ Form::submit('Update', array('class' => 'btn btn-lg btn-primary')) }}
      {{ link_to_route('equipos.show', 'Cancel', $equipo->id, array('class' => 'btn btn-lg btn-default')) }}
    </div>
</div>

{{ Form::close() }}

@stop