<?php
		session_start();
		include('php_conexion.php'); 
		$act="0";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  
	
  
  
    <meta charset="utf-8">
    <title>Entrar</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!--  styles -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <style type="text/css">
      body {
	padding-top: 40px;
	padding-bottom: 40px;
	background-color: #f5f5f5;
	
      }

      .form-signin {
        max-width: 300px;
        padding: 19px 29px 29px;
        margin: 0 auto 20px;
        background-color: #fff;
        border: 1px solid #e5e5e5;
        -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
                border-radius: 5px;
        -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
           -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
                box-shadow: 0 1px 2px rgba(0,0,0,.05);
      }
      .form-signin .form-signin-heading,
      .form-signin .checkbox {
        margin-bottom: 10px;
      }
      .form-signin input[type="text"],
      .form-signin input[type="password"] {
        font-size: 16px;
        height: auto;
        margin-bottom: 15px;
        padding: 7px 9px;
      }
		.banner { position: relative; overflow: auto; }
		.banner li { list-style: none; }
        .banner ul li { float: left; }
        

    </style>
    <link href="css/bootstrap-responsive.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="ico/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="ico/favicon.png">
  </head>

  <body>
		<script>
		$('.banner').unslider({
			speed: 500,               //  The speed to animate each slide (in milliseconds)
			delay: 3000,              //  The delay between slide animations (in milliseconds)
			complete: function() {},  //  A function that gets called after every slide animation
			keys: true,               //  Enable keyboard (left, right) arrow shortcuts
			dots: true,               //  Display dot navigation
			fluid: true              //  Support responsive design. May break non-responsive designs
		});
		</script>
  <script>
		$(function() {
		$('.banner').unslider();
		}); </script>
		
		
	<div class="banner">
		<ul>
			<li><img src="Slider/1235.jpg"/></li>
			<li><img src="Slider/1230.jpg"/></li>
			<li><img src="Slider/1232.jpg"/></li>
			<li><img src="Slider/1233.jpg"/></li>
			<li><img src="Slider/1231.jpg"/></li>
			<li><img src="Slider/1234.jpg"/></li>
		</ul>
	</div>
	
	
	</br>
	</br>
    <div class="container">
      <form name="form1" method="post" action="" class="form-signin">
        <h2 class="form-signin-heading">Bienvenid@s</h2>
        <input type="text" name="usuario" class="input-block-level" placeholder="Usuario">
        <input type="password" name="contra" class="input-block-level" placeholder="Contraseña">
        <button class="btn btn-large btn-primary" type="submit">Iniciar</button>
        <p>&nbsp;</p>
<?php
		$act="1";
		if(!empty($_POST['usuario']) and !empty($_POST['contra'])){
			$usuario=trim($_POST['usuario']);
			$contra=trim($_POST['contra']);
			$can=mysql_query("SELECT * FROM usuarios WHERE (usu='".$usuario."' or ced='".$usuario."') and con='".$contra."'");
			if($dato=mysql_fetch_array($can)){
				$_SESSION['username']=$dato['usu'];
				$_SESSION['tipo_usu']=$dato['tipo'];
				//inicializa las variables de caja por defecto//
				$_SESSION['tventa']="venta";
				$_SESSION['ddes']=0;
				///////////////////////////////
				if($_SESSION['tipo_usu']=='a' or $_SESSION['tipo_usu']=='ca'){
					header('location:Administrador.php');
				}
			}else{
				if($act=="1"){echo '<div class="alert alert-error" align="center">Usuario y Contraseña Incorrecta</div>';}else{$act="0";}
			}
		}else{
			
		}
	?>
      </form>
    </div> <!-- /container -->

	
	
	
	
	
    
  </body>
</html>
