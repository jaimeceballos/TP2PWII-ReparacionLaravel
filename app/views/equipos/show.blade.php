@extends('layouts.scaffold')

@section('main')

<h1>Show Equipo</h1>

<p>{{ link_to_route('equipos.index', 'Return to All equipos', null, array('class'=>'btn btn-lg btn-primary')) }}</p>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Tipo_equipo_id</th>
				<th>Cliente_id</th>
				<th>Descripcion_equipo</th>
				<th>Estado_general</th>
				<th>Baja</th>
		</tr>
	</thead>

	<tbody>
		<tr>
			<td>{{{ $equipo->tipo_equipo_id }}}</td>
					<td>{{{ $equipo->cliente_id }}}</td>
					<td>{{{ $equipo->descripcion_equipo }}}</td>
					<td>{{{ $equipo->estado_general }}}</td>
					<td>{{{ $equipo->baja }}}</td>
                    <td>
                        {{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('equipos.destroy', $equipo->id))) }}
                            {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                        {{ link_to_route('equipos.edit', 'Edit', array($equipo->id), array('class' => 'btn btn-info')) }}
                    </td>
		</tr>
	</tbody>
</table>

@stop
