@extends('layouts.base')

@section('main')

<h1>ABM Equipos</h1>

<p>{{ link_to_route('equipos.create', 'Nuevo', null, array('class' => 'btn btn-sm btn-success')) }}</p>

@if ($equipos->count())
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Tipo Equipo</th>
				<th>Propietario</th>
				<th>Descripcion</th>
				<th>Estado general</th>
				<th>&nbsp;</th>
			</tr>
		</thead>

		<tbody>
			@foreach ($equipos as $equipo)
				<tr>
					<td>{{{ $equipo->tipoEquipo->descripcion }}}</td>
					<td>{{{ $equipo->cliente->persona->ape_nom }}}</td>
					<td>{{{ $equipo->descripcion_equipo }}}</td>
					<td>{{{ $equipo->estado_general }}}</td>
                    <td>
                        <!--{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('equipos.destroy', $equipo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('equipos.edit', 'Edit', array($equipo->id), array('class' => 'btn btn-info')) }}-->
                        <a href="{{ URL::route('equipos.edit', $equipo->id) }}"><i class="glyphicon glyphicon-edit"></i></a>  
			{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('equipos.destroy', $equipo->id))) }}
                                <button class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></button>
                        {{ Form::close() }}
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	There are no equipos
@endif

@stop
