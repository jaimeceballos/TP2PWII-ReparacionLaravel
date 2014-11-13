<div class="form-group">
	<label>Trabajo a Realizar</label><br>
	{{ Form::textarea('trabajo_realizado', null, array('class'=>'form-control', 'placeholder'=>'Describa el trabajo realizado')) }}
</div>
<div class="form-group">
	<label>Importe del Trabajo Realizado</label><br>
	<div class="input-group">
	  <span class="input-group-addon">$</span>
	  {{ Form::text('importe_trabajo',null,array('class'=>'form-control'))}}
	</div>
</div>
<div class="form-group">
	<label>Numero de Factura</label><br>
	{{ Form::text('numero_factura', null, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	<label>Numero de Remito de entrega</label><br>
	{{ Form::text('remito_entrega', null, array('class'=>'form-control')) }}
</div>