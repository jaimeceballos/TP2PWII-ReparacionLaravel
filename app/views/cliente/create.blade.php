@extends('layouts.base')
@section('main')

@if ($errors->any())
	<ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>

@endif


<h1>Nuevo Cliente</h1>
<hr>

{{Form::open(['route'=>'cliente.store'])}} 
	<div class="form-group">
		<label>Apellido y nombre</label>
		{{Form::text('ape_nom','',['class'=>'form-control','placeholder'=>'Apellido y nombre'])}}<br>
	</div>	
	<div class="form-group">
		<label>Persona juridica</label>
		{{ Form::select('juridica', array('0' => 'no', '1' => 'Si'),null,array('class'=>'form-control','id'=>'juridica')) }}<br>
	</div>
	<div class="form-group" id="divdni">
		<label>Numero de documento</label>
		{{Form::number('dni','',['placeholder'=>'documento','class'=>'form-control','id'=>'dni'])}}<br>
	</div>	
	<div class="form-group" id="divcuit" style="display:none">
		<label>Numero de cuit</label>
		{{Form::number('cuit','',['placeholder'=>'cuit','class'=>'form-control','id'=>'cuit'])}}<br>
	</div>
	<div class="form-group">
		<label>Domicilio</label>
		{{Form::Text('domicilio','',['placeholder'=>'domicilio','class'=>'form-control'])}}<br>
	</div>
	<div class="form-group">
		<label>Telefono</label>
		{{Form::text('telefono','',['placeholder'=>'Nro de telefono fijo o celular','class'=>'form-control'])}}<br>
	</div>
	<div class="form-group">
		<label>Email</label>
		{{Form::email('email','',['placeholder'=>'usuario@ejemplo.com','class'=>'form-control'])}}<br>
	</div>
	<a href="{{ URL::route('cliente.index') }}" class="btn btn-link">Cancelar</a>
	<button type="submit" class="btn btn-info btn-sm pull-right"><strong>Guardar</strong></button>
{{Form::close()}}
@stop