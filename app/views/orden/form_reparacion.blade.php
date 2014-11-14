@if(!$orden->fecha_finalizado)
{{ Form::model($orden, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('orden.update', $orden->id))) }}
@else
{{ Form::model($orden, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('entrega', $orden->id))) }}
@endif
<div class="form-group">
	<label>Trabajo Realizado</label><br>
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
	{{ Form::text('nro_factura', null, array('class'=>'form-control')) }}
</div>
<div class="form-group">
	<label>Numero de Remito de entrega</label><br>
	{{ Form::text('remito_entrega', null, array('class'=>'form-control','id'=>'remito')) }}
	{{ Form::hidden('remito2', null, array('id'=>'remito2')) }}
</div>
@if(!$orden->fecha_finalizado)
{{ Form::submit('Guardar', array('class' => 'btn btn-sm btn-success pull-right')) }}
@else
<button type = "submit" class="btn btn-sm btn-primary" id="entrega" onclick="return validaRemito();">Registrar entrega</button>
@endif
{{ Form::close() }}