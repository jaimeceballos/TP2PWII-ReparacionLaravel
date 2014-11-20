<div class="container">
<div class="row clearfix">
	<div class="col-md-6 column">
			<div class="form-group" id="divorden">
				 <label for="dni">Ingrese el numero de su orden de trabajo</label>
				 {{ Form::text('orden', null, array('class'=>'form-control', 'required'=>'required','id'=>'orden','autocomplete'=>'off')) }}
			</div>
			
			<a href="javascript:porOrden();" class="btn btn-xs btn-primary pull-right"><i class="glyphicon glyphicon-search"></i> Ejecutar Consulta</a>
	</div>
</div>
</div>