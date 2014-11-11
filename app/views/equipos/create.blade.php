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

        @include('equipos.form');
        

{{ Form::close() }}

@stop


