<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Practico Integrador</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" href="{{ asset('static/css/bootstrap.min.css') }}" media="all">
    <link rel="stylesheet" href="{{ asset('static/css/login.css') }}" media="all">
    <style type="text/css">
      

    </style>

</head>
<body>
  <div class="container">
  	@if(Session::has('mensaje_error'))
            {{ Session::get('mensaje_error') }}
        @endif
	<center><label>Bienvenido</label></center>
	<center><label>Ingrese sus datos para comenzar</label></center>

    <div class="content signin-card">
      <div class="row">
        <div class="login-form">
         <center><img id="profile-img" class="profile-img" src="{{asset('static/img/avatar_2x.png')}}" alt="" style=""></center>
         {{Form::open(['route'=>'login'])}} 
         
            <center>
              <div>
                
                {{Form::text('usuario','',['class'=>'form-control','placeholder'=>'Usuario'])}}
                {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}    
                </div>
              <br>
              <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
            </center>   
          {{Form::close()}}
        </div>
      </div>
    </div>

  </div> <!-- /container -->
</body>
</html>