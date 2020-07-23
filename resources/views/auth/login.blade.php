<!DOCTYPE html>
<html lang="en">
<head>
	<title>Inicio de Sesion</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
<div class="limiter">
<div class="container-login100">
<div class="wrap-login100">
<div class="login100-pic js-tilt" data-tilt>
	<img src="images/img-01.png" alt="IMG">
</div>
@guest
	<form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
	@csrf
	<span class="login100-form-title">Inicio de Sesión</span>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa tu CI: ">
						<input id="id_usuario" type="text" class="input100" name="id_usuario" value="{{ old('id_usuario') }}" required autocomplete="id_usuario" autofocus="">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
						<i class="fa fa-user" aria-hidden="true"></i>
						</span>                               
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Ingresa tu contraseña">
						<input id="password" type="password" class="input100" name="password" required autocomplete="current-password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Ingresar
						</button>
					</div>

					<div class="text-center p-t-12">
						<!--<span class="txt1">
							Olvide mi Contraseña
						</span>
						<a class="txt2" href="#">
							Email / Password?
						</a>-->
					</div>

					<div class="text-center p-t-136">
						<a class="txt2" href="#">
							Solicitar Registro
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a>
					</div>
				</form>
@endguest
@auth
	<form class="login100-form validate-form">
	@csrf
	<span class="login100-form-title">Tu sesion ha caducado.</span>
	<h4 class="fa fa-right m-l-5" aria-hidden="true">{{ auth()->user()->nombre_usuario}} {{ auth()->user()->apellido_paterno_usuario}} {{ auth()->user()->apellido_materno_usuario}}</h4>

					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn"  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
							Iniciar Sesion
						</button>
					</div>

					
	</form>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
       @csrf
    </form>

@endauth
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>