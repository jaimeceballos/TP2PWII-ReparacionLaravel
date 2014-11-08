<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>TP2PWII-Reparacion Laravelizado</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	 @include('layouts.assets')
</head>
<body class="body">
	<div class="container">
	<div class="row clearfix">
            
		<div class="col-xs-10">
			<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
				<div class="navbar-header">
					 <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button> <a class="navbar-brand" href="#">TP2PWII-Reparacion</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						
						<li class="dropdown">
                           @if(Auth::user()->rol == 'cliente' )
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="">Listar</a>
								</li>
								<li>
									<a href="">Nuevo</a>
								</li>
								<li>
									<a href="">Buscar</a>
								</li>
							</ul>
                            @else
	                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Empleados<strong class="caret"></strong></a>
								<ul class="dropdown-menu">
									<li>
										<a href="{{ URL::route('cliente.index') }}">Alta/edicion de Clientes</a>
									</li>
									<li>
										<a href="{{ URL::route('equipos.index') }}">Alta de Equipo</a>
									</li>
									<li>
	                                    <a href="">Nueva orden de trabajo</a>
									</li>
								</ul>
                            @endif   
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="dropdown">
							 <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> {{ Auth::user()->username }}<strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li>
									<a href="{{ URL::route('logout') }}">Salir</a>
								</li>
							</ul>
						</li>
					</ul>
				</div>
				
			</nav>
		</div>
             
	</div>

</div>
<div class="cuerpo">
       
	@yield('main')
</div>
</body>
</html>