@extends('layouts.base')

@section('main')
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
<h1>Ordenes de trabajo</h1><br>

<p>{{ link_to_route('orden.create', 'Generar Orden', null, array('class' => 'btn btn-sm btn-success')) }}</p>

@if ($ordenes->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Nro</th>
				<th>Cliente</th>
				<th>Tipo Orden</th>
				<th>Fecha Ingreso</th>
				<th>Fecha Finalizado</th>
                <th></th>
			</tr>
		</thead>

		<tbody>
			@foreach ($ordenes as $item)
				<tr>
					<td>{{{ $item->id }}}</td>
					<td>{{{ $item->cliente->persona->ape_nom }}}</td>
					<td>{{{ $item->tipoOrden->descripcion }}}</td>
					<td>{{{ date( "d/m/Y",strtotime($item->fecha_entrada)) }}}</td>
					@if($item->fecha_finalizado)
						<td>{{{ date( "d/m/Y",strtotime($item->fecha_finalizado)) }}}</td>
					@else
						<td></td>
					@endif
                                        <td>
                                        	
                                            <a href="{{ URL::route('orden.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i></a>  
                                            {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('orden.destroy', $item->id))) }}
                                                    <button class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></button>
                                            {{ Form::close() }}
                                            @if((date( "d/m/Y",strtotime($item->fecha_entrada))-$dia)<2)
                                            	<span class="label label-primary">Nuevo</span>
                                            @endif
                                        </td>
                   
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	No hay ordenes vigentes.
@endif

@stop