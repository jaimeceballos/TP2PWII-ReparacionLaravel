@extends('layouts.base')
@section('main')
	<h1>Bienvenido <small>{{ Auth::user()->username }}</small></h1>
@stop