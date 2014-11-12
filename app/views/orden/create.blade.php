@extends('layouts.base')
@section('main')
<h1>Nueva Orden de trabajo</h1>
<hr>
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

{{ Form::open(array('route' => 'orden.store', 'class' => 'form-horizontal')) }}

        @include('orden.form');
        

{{ Form::close() }}
@stop