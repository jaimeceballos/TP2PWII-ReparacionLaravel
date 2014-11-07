@extends('layouts.base')
@section('main')

<h1> ABM de clientes</h1>
<hr>

<a href="{{ URL::route('cliente.create') }}" class="btn btn-success ">nuevo</a>
<hr>

<table class="table condensed bordered">
<thead>
	<tr>
		<th>N° Cliente</th>
		<th>Nombre / Razon social</th>
		<th></th>
	</tr>
</thead>
<tbody>
	@foreach($clientes as $item)
		<tr>
			<td>{{$item->id}}</td>
			<td>{{$item->persona->ape_nom}}</td>
			<td><a href="{{ URL::route('cliente.edit', $item->id) }}"><i class="glyphicon glyphicon-edit"></i></a>  
			{{ Form::open(array('style' => 'display: inline-block;', 'method' => 'DELETE', 'route' => array('cliente.destroy', $item->id))) }}
                    <button class="btn btn-link"><i class="glyphicon glyphicon-trash"></i></button>
                {{ Form::close() }}

			<!--<a href="{{ URL::route('cliente.destroy',$item->id) }}"><i class="glyphicon glyphicon-trash"></i></a--></td>
		</tr>
	@endforeach
</tbody>
</table>
@stop