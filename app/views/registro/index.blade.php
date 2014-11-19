@extends('publico.base')
@section('main')
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
<div class="bg-primary"> 

	<center><h1>Registro de usuario</h1></center>
	<div class="container">
			@if($conf)
			<div class="row">
				<h4> Su registro se llevo a cabo con exito!!! </h4>
				<p>Puede ingresar haciendo <a href="{{ URL::route('home') }}" class="btn btn-sm btn-success">click aqui</a> </p>

			</div>
			@else
			<div class="row">
			
			<div class="col-md-12 column">
				<div class="jumbotron reg-text">
				{{Form::open(['route'=>'registro'])}} 
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
					<fieldset class="reg-field">
					<div class="form-group">
						<label>Usuario</label>
						{{Form::text('username','',['class'=>'form-control'])}}<br>
					</div>
					
					<div class="row clearfix">
						<div class="col-md-4 column">
							<label>Contrase&ntilde;a</label><br>
									{{Form::password('password','',['class'=>'form-control'])}}<br>
						</div>
						<div class="col-md-4 column">
							<label>Reingrese la Contrase&ntilde;a</label><br>
									{{Form::password('password_confirmation','',['class'=>'form-control'])}}<br>
						</div>
						
					</div>
					</fieldset>

					<br>
					<a href="{{ URL::route('inicio') }}" class="btn btn-link">Cancelar</a>
					<button type="submit" class="btn btn-info btn-sm pull-right"><strong>Guardar</strong></button>
				{{Form::close()}}
			</div>	
		</div>
	</div>
	@endif
</div>
</div>
@stop