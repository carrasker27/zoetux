<?php
//iniciamos las seciones
session_start();
//archivos necesarios para el funcionamiento
require_once 'php/db/config.php';
require_once 'php/db/conexion.php';
require_once 'php/db/esUsuario.php';
//obtenemos la variable para la base de datos
   $dbConn= conectar();
    $error = "";
   //verificamos que no este conectado el usuario
   if(!empty($_SESSION['usuario']) && !empty($_SESSION['password']))
   {
	   if(esUsuario($_SESSION['usuario'], $_SESSION['password'], $dbConn))
	   {
		   header('Location: php/selfAdmin/index.php');
		   die;
	   }
   }
   //verificamos si se envio el formulario
   
   if(!empty($_POST['submit']))
   {
	   if(!empty($_POST['usuario'])) $usuario=$_POST['usuario'];
	   if(!empty($_POST['password'])) $password=$_POST['password'];
	  
	   //checamos si no ahy errores 
	   if(empty($error))
	   {
		   //verificamos si los datos ingresados estan corresponden a un usuario
		   if($arrUsuario=esUsuario($usuario,md5($password),$dbConn))
		   {
			   //definimos los sessiones 
			   $_SESSION['usuario']=$arrUsuario['usuario'];
			   $_SESSION['password']=$arrUsuario['password'];
			   $paso="user=".$usuario;
			   $link = "Location: php/selfAdmin/index.php?".$paso;
			   header($link);
			   die;
		   }
		   else{	$error="El nombre de usuario o Contrase&ntilde;a no coinciden";   }
	   }
   }

?>

<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Zoetux.com / Diseno Web</title>
<meta charset="utf-8" />
<meta name="viewport" content="width = device-width, initial-scale=1, maximum-scale=1"/>
<meta name="keywords" content="zoetux.com, zoetux, tux, web, paginas web, desarrollo, desarrollo web" />
<link type="text/css" href="css/service.css" rel="stylesheet" />
<link rel="shortcut icon" href="images/PALOMITA.png">
<!--[if lt IE 9]>
<script type="text/javascript">
   document.createElement("nav");
   document.createElement("header");
   document.createElement("footer");
   document.createElement("section");
   document.createElement("article");
   document.createElement("aside");
   document.createElement("hgroup");
</script>
<![endif]-->
<script>
	function validar(){
		var user = document.form1.usuario.value
		var pass = document.form1.password.value
		if(user == "" || user.length < 2){ alert("Favor de agregar usuario"); form1.usuario.focus(); return false; }
		if(pass == "" || pass.length < 2) { alert("Favor de agregar password"); form1.password.focus(); return false; }
	}
	</script>

</head>
 
<body>
	<div id="container">
		<header>
			<div class="izq">
				<a href="index.html"><img src="images/Zoetux3.png" width="250" height="70"  alt="ZoeTux" /></a>
			</div>
			<div class="der">
				<h1  itemprop="title">DESARROLLO WEB VANGUARDISTA</h1>                
			</div>
		</header>
		
		<ul id="nav">
			<li><a href="index.html">INICIO</a></li>
		    <li class="current-menu-item"><a href="diseno.html">Diseno Web</a></li>
			<li><a href="desarrollo.html">Desarrollo Web</a></li>
		  	<li><a href="ventajas.html">Ventajas y Beneficios</a></li>
			<li><a href="promocion.html">PROMOCION</a></li>
          	<li><a href="informacion.html">Informacion</a></li>
		</ul>

		<div id="information">
            
		<form action="login.php" method="post" id="searchform" name="form1" onsubmit="return validar()">
   			<table align="center">
     			<tr>
      				<td colspan="2" align="center"><h2><b>Login Zoetux</b></h2></td>
     			</tr>
     			<tr>
      				<td height="38"><p>Usuario:</p></td>
       				<td> <input name="usuario" type="text" id="s" /></td>
      			</tr>
      			<tr>
       				<td><p>Password: </p></td>
       				<td><input name="password" type="password" id="s" /></td>
      			</tr>
      			<tr><td colspan="2" align="center"><p style="color:#F00"><?= $error ?></p></td></tr>
      			<tr>
         			<td colspan="2" align="left"><input type="submit" name="submit" value="Entrar" /></td>
      			</tr>
      		</table>
		</form>
		</div>
	</div>
	<footer>
			<nav>
				<ul>
					<li><a href="http://www.facebook.com/pages/Zoetux/141890809319882?ref=stream"  title="Become a fan" target= "_blanck"><img src="images/facebook2.png" height="32" width="32"/></a></li>
					<li><a href="http://www.twitter.com/Zoetux" title="Follow our tweets" target= "_blanck"><img src="images/twitter2.png" height="32" width="32" /></a></li>
   					<li><a href="/php/user_index.php"  title="Login"><img src="images/login2.png" width="32" height="32" /></a></li>
					<!--<li><a href="?idioma=0"  title="Espanol" ><img src="images/mexico.png" height="32" width="32" /></a></li>
					<li><a href="?idioma=1"  title="Ingles"><img src="images/ingles.png" width="32" height="32" /></a></li>-->
				</ul>
			</nav>
			<p>CopyRight 2013 <a href="index.html">ZoeTux.com</a></p>
	</footer>
	

</body>
</html>