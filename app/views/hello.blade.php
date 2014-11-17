<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	@include('layouts.assets')
</head>

<body>
	
		<div>
			<div class="carousel slide" id="carousel-179800">
				<ol class="carousel-indicators">
					<li data-slide-to="0" data-target="#carousel-179800">
					</li>
					<li data-slide-to="1" data-target="#carousel-179800">
					</li>
					<li data-slide-to="2" data-target="#carousel-179800" class="active">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item">
						<img alt="" src="{{asset('static/img/1.jpg')}}" />
						<div class="carousel-caption">
							<h4>
								<a href="" class="btn btn-block btn-danger pull-right">Servicio de Calidad a su alcance</a>
							</h4>
							<p class="bg-primary">
								Le ofrecemos un servicio de primera calidad, garantizamos nuestros trabajos<br>
								y todo a un costo al alcance de su bolsillo.
							</p>
						</div>
					</div>
					<div class="item">
						<img alt="" src="{{asset('static/img/2.jpg')}}" />
						<div class="carousel-caption">
							<h4>
								<a href="" class="btn btn-block btn-danger pull-right">Deteccion de errores de sistema y de hardware</a>
							</h4>
							<p class="bg-primary">
								Si esta cansado de la Pantallita azul del amigo Bill, somos su mejor opcion.<br>
								Contamos con un equipo especializado en detectar esas maleficas fallas.
							</p>
							
						</div>
					</div>
					<div class="item active">
						<img alt="" src="{{asset('static/img/3.jpg')}}" />
						<div class="carousel-caption">
							<h4>
								<a href="" class="btn btn-block btn-danger pull-right">Equipo Tecnico capacitado</a>
							</h4>
							<p class="bg-primary">
								Nuestro equipo se capacita constantemente para estar preparado para los rapidos cambios de la tecnologia<br>
								y de esta manera ofrecerle un servicio seguro y garantizado.
							</p>
						</div>
					</div>
				</div> <a class="left carousel-control" href="#carousel-179800" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a> <a class="right carousel-control" href="#carousel-179800" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
			</div>
		</div>
		<div class="bg-primary section">
			<div class="container">
				<br>
			<div class="row ">
			  <div class="col-sm-4 col-md-4">
			    <div class="thumbnail">
			      <img src="{{asset('static/img/4.jpg')}}" class="thumbnail">
			      <div class="caption">
			        <h3>Seguimiento on line</h3>
			        <p>Consulte en linea el proceso de reparacion de su equipo.</p>
			        <p><a href="#" class="btn btn-block btn-info" role="button">Consultar</a> </p>
			      </div>
			    </div>
			  </div>
			
			
			  <div class="col-sm-4 col-md-4">
			    <div class="thumbnail">
			      <img src="{{asset('static/img/5.jpg')}}" class="thumbnail">
			      <div class="caption">
			        <h3>Solicitud de servicio On line</h3>
			        <p>Registrese en nuestro sitio para solicitar servicio para su equipo desde su casa.</p>
			        <p><a href="#" class="btn btn-block btn-info" role="button">Registrarse</a> </p>
			      </div>
			    </div>
			  </div>
			
			  <div class="col-sm-4 col-md-4">
			    <div class="thumbnail">
			      <img src="{{asset('static/img/6.jpg')}}" class="thumbnail">
			      <div class="caption">
			        <h3>Aplicacion m&oacute;vil</h3>
			        <p>Reciba notificaciones sobre su equipo en servicio tecnico en su equipo movil.</p>
			        <p><a href="#" class="btn btn-block btn-info" role="button">Descargar la aplicacion</a> </p>
			      </div>
			    </div>
			  </div>
			</div>
		</div>
		</div>
		<div class="footer">
		</div>
</body>
</html>
