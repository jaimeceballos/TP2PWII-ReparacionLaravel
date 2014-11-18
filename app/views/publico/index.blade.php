
@extends('publico.base')
@section('main')
	
		<div>
			@include('publico.head')		
		</div>
		<div class="bg-primary section">
			@include('publico.features')
		</div>
		<div class="section bg-seguimiento" id="seguimiento" style="display:none">
		<div class="container">
			<h1>Seguimiento de equipos en servicio tecnico</h1>
			<hr>
			<!-- Nav tabs -->
			<div class="row">
				<div class="col-xs-12 col-md-12">
				<ul class="nav nav-pills" id="tabs_seguimiento" role="tablist">
				    <li><a href="#tab_pordni" role="tab" data-toggle="tab">Busqueda por Nro. de documento</a></li>
				  <li class="active"><a href="#tab_por_orden" role="tab" data-toggle="tab">Busqueda por Nro. de orden</a></li>
				</ul>
				</div>
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
				    <div class="tab-pane" id="tab_pordni">
				        <h3>En Construccion</h3>
				    </div>
				    <div class="tab-pane active" id="tab_por_orden">
				       @include('publico.pororden')
				    </div>
				</div>
				</div>

				<script>
				    $(function(){
				        $('#tabs_seguimiento a').click(function (e) {
				            e.preventDefault();
				            $(this).tab('show');
				        });
				    });
				</script>
						


		</div>
		<div class="results bg-primary" id="results" name="results">
			

		</div>
		<div class="footer">
			@include('publico.footer')
		</div>

@stop