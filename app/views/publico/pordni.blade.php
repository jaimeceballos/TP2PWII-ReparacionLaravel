<div class="container">
<div class="row clearfix">
	<div class="col-md-6 column">
	{{ Form::open(array('route' => 'seguimiento', 'class' => 'form-horizontal')) }}
		<form role="form">
			<div class="form-group">
				 <label for="dni">Ingrese su numero de documento</label>
				 {{ Form::text('dni', null, array('class'=>'form-control', 'required'=>'required')) }}
			</div>
			
			<button type="submit" class="btn btn-xs btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Ejecutar Consulta</button>
	{{ Form::close() }}
	</div>
</div>
</div>