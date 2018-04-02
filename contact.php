<?php
  
     header("Content-type: text/html;charset=\"utf-8\"");
    $error = ""; $mensajeExito = "";

    if ($_POST) {
        if ($_POST['email'] && filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
            $error .= "E-mail no válido.<br>";   
        }
        if ($error != "") {
            $error = '<div class="alert alert-danger" role="alert"><p><b>Se generó un error:</b></p>' . $error . '</div>';
        } else {
            $nombre = $_POST['fname'];
            $apellido = $_POST['lname'];
            $mail = $_POST['email'];
            $asunto = $_POST['subject'];
            $mensajeC = $_POST['message'];
            
            $header = 'From: ' . $mail . " \r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
            $header .= "Mime-Version: 1.0 \r\n";
            $header .= "Content-Type: text/plain";

            $mensaje = "Este mensaje fue enviado por " . $nombre . ",\r\n";
            $mensaje .= "Su e-mail es: " . $mail . " \r\n";
            $mensaje .= "Asunto: " . $asunto . " \r\n";
            $mensaje .= "Mensaje: " . $mensajeC . " \r\n";
            $mensaje .= "Enviado el " . date('d/m/Y', time());

            $para = 'info@bombesoftware.com';
            $asunto = 'Mensaje de mi sitio web';

            if (mail($para, $asunto, utf8_decode($mensaje), $header)) {
                $mensajeExito = '<div class="alert alert-success" role="alert">Mensaje enviado con éxito :)</div>';    
            } else {
                $error = '<div class="alert alert-danger" role="alert"><p><strong>Mensaje sin enviar :(</div>';  
            } 
        }  
    }
?>
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Contacto</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Pagina oficial de Bombe Software" />
	<meta name="keywords" content="Bombe software page" />
	<meta name="author" content="Bombe Software.co" />

	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link rel="stylesheet" href="./css/animate.css">
	<link rel="stylesheet" href="./css/icomoon.css">
	<link rel="stylesheet" href="./css/bootstrap.css">
	<link rel="stylesheet" href="./css/magnific-popup.css">
	<link rel="stylesheet" href="./css/owl.carousel.min.css">
	<link rel="stylesheet" href="./css/owl.theme.default.min.css">
	<link rel="stylesheet" href="./css/style.css">
	<script src="./js/modernizr-2.6.2.min.js"></script>
	</head>
	<body>
		
	<div class="gtco-loader"></div>
	<div id="page">
	<nav class="gtco-nav" role="navigation">
		<div class="gtco-container">
			<div class="row">
				<div class="col-xs-2">
					<div id="gtco-logo"><a href="./index.html"><img src="./images/bombe.png" class="img-thumbnail" /></a></div>
				</div>
				<div class="col-xs-8 text-center menu-1">
					<ul>
						<li class=""><a href="./index.html">Inicio</a></li>
						<li class=""><a href="./about.html">Acerca de</a></li>
						<li class=""><a href="./services.html">Productos</a></li>
						<li class="active"><a href="./contact.php">Contacto</a></li>
				</div>
				<div class="col-xs-2 text-right hidden-xs menu-2">
				</div>
			</div>
			
		</div>
	</nav>

	<header id="gtco-header" class="gtco-cover gtco-cover-sm" role="banner" style="background-image:url(./images/img_bg_1.jpg);">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Contáctanos</h1>
							<h2>Acércate, tenemos una solución para tí</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<div class="gtco-section">
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-6 animate-box">
					<h3>¿Tienes una pregunta?</h3>
					<div><?php echo $error.$mensajeExito; ?></div>
					<form name="formContact" id="formContact" method="post">
						<div class="row form-group">
							<div class="col-md-6">
								<label for="fname">Nombre</label>
								<input required type="text" name="fname" id="fname" class="form-control" placeholder="Nombre">
							</div>
							<div class="col-md-6">
								<label for="lname">Apellidos</label>
								<input required type="text" name="lname" id="lname" class="form-control" placeholder="Apellidos">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="email">Correo electrónico</label>
								<input required type="text" name="email" id="email" class="form-control" placeholder="Correo electrónico">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="subject">Título</label>
								<input required type="text" name= "subject" id="subject" class="form-control" placeholder="Título del mensaje">
							</div>
						</div>
						<div class="row form-group">
							<div class="col-md-12">
								<label for="message">Descripción</label>
								<textarea required  name="message" id="message" cols="30" rows="10" class="form-control" placeholder="Escribe tu duda"></textarea>
							</div>
						</div>
						<div class="form-group">
							<input type="submit" name="BEnviar" id="BEnviar" value="Enviar" class="btn btn-primary offset-2">
						</div>

					</form>		
				</div>
				<div class="col-md-5 col-md-push-1 animate-box">
					
					<div class="gtco-contact-info">
						<h3>Infórmación</h3>
						<ul>
							<li class="address">246 Mar Mediterráneo, Popotla, <br> CDMX</li>
							<li class="phone"><a href="tel://555235598">+55 523 5598</a></li>
							<li class="email"><a href="mailto:info@bombesoftware.com">info@bombesoftware.com</a></li>
						</ul>
					</div>

				</div>
			</div>
		</div>
	</div>

	<div class="gtco-cover gtco-cover-sm" style="background-image:url(./images/img_bg_3.jpg);">
		<div class="overlay"></div>
		<div class="gtco-container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 text-center">
					<div class="display-t">
						<div class="display-tc animate-box" data-animate-effect="fadeIn">
							<h1>Bombe Software</h1>
							<h2>Unete a nuestra comunidad.Esto recien comienza...</h2>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<footer id="gtco-footer" role="contentinfo">
		<div class="gtco-container">
			<div class="row row-pb-md">
				<div class="col-md-4 gtco-widget">
					<h3>Bombe Software</h3>
					<p>Una empresa enfocada en la solución de problemas reales</p>
				</div>
			</div>
			<div class="row copyright">
				<div class="col-md-12">
					<p class="pull-left">
						<small class="block">&copy; 2017 Bombe Software.</small> 
						<small class="block"> Todos los derechos son reservados.
					</p>
					<p class="pull-right">
						<ul class="gtco-social-icons pull-right">
							<li><a href="https://twitter.com/bombesoftware"><i class="icon-twitter"></i></a></li>
							<li><a href="https://www.facebook.com/bombesoftware"><i class="icon-facebook"></i></a></li>
							<li><a href="https://www.instagram.com/bombesoftware/"><i class="icon-instagram"></i></a></li>
						</ul>
					</p>
				</div>
			</div>
		</div>
	</footer>
	</div>

	<div class="gototop js-top">
		<a href="./contact.php" class="js-gotop"><i class="icon-arrow-up"></i></a>
	</div>
	<!-- jQuery -->
	<script src="./js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="./js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="./js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="./js/jquery.waypoints.min.js"></script>
	<!-- Carousel -->
	<script src="./js/owl.carousel.min.js"></script>
	<!-- countTo -->
	<script src="./js/jquery.countTo.js"></script>
	<!-- Magnific Popup -->
	<script src="./js/jquery.magnific-popup.min.js"></script>
	<script src="./js/magnific-popup-options.js"></script>
	<!-- Main -->
	<script src="./js/main.js"></script>
   

	</body>
</html>