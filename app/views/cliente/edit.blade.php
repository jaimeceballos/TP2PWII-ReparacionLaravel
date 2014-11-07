@extends('layouts.base')
@section('main')

@if ($errors->any())
	<ul>
        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
    </ul>

@endif


<h1>Editar Cliente</h1>
<hr>

{{Form::open(['route'=>array('cliente.update',$cliente->id),'method'=>'PUT'])}} 
	<div class="form-group">
		<label>Apellido y nombre</label>
		{{Form::text('ape_nom',$persona->ape_nom,['class'=>'form-control','placeholder'=>'Apellido y nombre'])}}<br>
	</div>	
	<div class="form-group">
		<label>Persona juridica</label>
		{{ Form::select('juridica', array('0' => 'no', '1' => 'Si'),$persona->juridica,array('class'=>'form-control','id'=>'juridica')) }}<br>
	</div>
	@if($persona->juridica == 0)
		<div class="form-group" id="divdni">
			<label>Numero de documento</label>
			{{Form::number('dni',$persona->dni,['placeholder'=>'documento','class'=>'form-control','id'=>'dni'])}}<br>
		</div>	
	@else
		<div class="form-group" id="divcuit">
			<label>Numero de cuit</label>
			{{Form::number('cuit',$persona->cuit,['placeholder'=>'cuit','class'=>'form-control','id'=>'cuit'])}}<br>
		</div>
	@endif	
	<div class="form-group">
		<label>Domicilio</label>
		{{Form::Text('domicilio',$persona->domicilio,['placeholder'=>'domicilio','class'=>'form-control'])}}<br>
	</div>
	<div class="form-group">
		<label>Telefono</label>
		{{Form::text('telefono',$persona->telefono,['placeholder'=>'Nro de telefono fijo o celular','class'=>'form-control'])}}<br>
	</div>
	<div class="form-group">
		<label>Email</label>
		{{Form::email('email',$persona->email,['placeholder'=>'usuario@ejemplo.com','class'=>'form-control'])}}<br>
	</div>
	<div class="checkbox">
		 <label> {{Form::checkbox('activo', $cliente->activo,['required'=>'required'])}}Esta activo?</label>
	</div>
	<a href="{{ URL::route('cliente.index') }}" class="btn btn-link">Cancelar</a>
	<button type="submit" class="btn btn-info btn-sm pull-right"><strong>Guardar</strong></button>
{{Form::close()}}
@stop