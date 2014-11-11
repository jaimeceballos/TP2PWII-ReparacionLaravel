@extends('layouts.base')

@section('main')
<h1>Ordenes de trabajo</h1><br>
<p>{{ link_to_route('orden.create', 'Generar Orden', null, array('class' => 'btn btn-sm btn-success')) }}</p>

@if ($ordenes->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Cliente</th>
				<th>Fecha Ingreso</th>
				<th>Tipo Orden</th>
                                <th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ordenes as $item)
				<tr>
					<td>{{{ $item->id }}}</td>
					<td>{{{ $item->cliente_id }}}</td>
					<td>{{{ $item->fecha_ingreso }}}</td>
					<td>{{{ $item->tipo_orden_id }}}</td>
                                        <td>
                                            <a href="{{ URL::route('orden.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i></a>  
                                            {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('orden.destroy', $item->id))) }}
                                                    <button class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></button>
                                            {{ Form::close() }}
                                            
                                        </td>
                   
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay ordenes vigentes.
@endif

@stop