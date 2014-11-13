{{ Form::model($orden, array('class' => 'form-horizontal', 'method' => 'PATCH', 'route' => array('orden.update', $orden->id))) }}
<div class="form-group">
	<label>Trabajo Sugerido</label><br>
	{{ Form::textarea('trabajo_realizado', null, array('class'=>'form-control', 'placeholder'=>'Describa el trabajo que sugiere realizar')) }}
</div>
<div class="form-group">
	<label>Numero de Remito de entrega</label><br>
	{{ Form::text('remito_entrega', null, array('class'=>'form-control','id'=>'remito')) }}
</div>

@if(!$orden->presupuestado)
	<button type = "submit" class="btn btn-sm btn-danger pull-right">Generar Presupuesto</button>
	{{ Form::close() }}
@else
	
	<button type = "submit" class="btn btn-sm btn-danger pull-right">Generar Orden de trabajo</button>
	{{ Form::close() }}
	{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'PATCH', 'route' => array('entrega', $orden->id))) }}
		{{ Form::hidden('remito2', null, array('id'=>'remito2')) }}
		
		<button type = "submit" class="btn btn-sm btn-primary" id="entrega" onclick="return validaRemito();">Entregar Equipo</button>
	{{ Form::close() }}
@endif
