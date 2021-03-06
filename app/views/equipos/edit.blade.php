@extends('layouts.base')

@section('main')
<h1>Editar un Equipo</h1>
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

{{ Form::model($equipo, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('equipos.update', $equipo->id))) }}

        @include('equipos.form');

{{ Form::close() }}

@stop