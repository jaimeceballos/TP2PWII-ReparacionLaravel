
<h1> ABM de clientes</h1>


<a href="{{ URL::route('cliente.create') }}">nuevo</a>

<table>
<thead>
	<tr>
		<th>id</th>
		<th>cliente</th>
		<th>estado</th>
		<th></th>
	</tr>
</thead>
<tbody>
	@foreach($clientes as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->persona->ape_nom}}</td>
			<td>{{$item->activo}}</td>
			<td><a href="{{ URL::route('cliente.edit', $item->id) }}">editar</a> - <a href="">eliminar</a></td>
		</tr>
	@endforeach
</tbody>
</table>