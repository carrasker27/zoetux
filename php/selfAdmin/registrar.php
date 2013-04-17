<?php

//archivos para la conexion
require_once '../db/config.php';
require_once '../db/conexion.php';

$user = $_REQUEST['user'];

//variable para la conexion a la base de datos

$dbConn= conectar();
if(!empty($_POST['submit']))
	 {
		 if(!empty($_POST['usuario'])) $usuario=$_POST['usuario'];
		 if(!empty($_POST['password'])) $password=$_POST['password'];
		 if(!empty($_POST['repassword'])) $rePassword=$_POST['repassword'];
		 if(!empty($_POST['email'])) $email=$_POST['email'];
		 if(!empty($_POST['name'])) $name = $_POST['name'];
	 
		  //inserto los datos en la bd
			 $query="INSERT INTO usuarios (capa_nombre,capa_usuario,capa_password,capa_email) VALUES ('$name','$usuario','".md5($password)."','$email')";
			 
			 $result=mysql_query($query, $dbConn);
			 
			// header('Location: index.php?registro=true'); //mandar a inicio de session
			 //die;
		
	 }//fin del primer if 
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../css/admin.css" rel="stylesheet" />
<script>
function validar(){
	var name = document.form1.name.value
	var user = document.form1.usuario.value
	var pass = document.form1.password.value
	var pass2 = document.form1.repassword.value
	var email = document.form1.email.value
	
	var re  = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	
	if(name == "" || name.length < 2){ alert("Favor de agregar el nombre del usuario"); form1.name.focus(); return false; }
	if(user == "" || user.length < 2){ alert("Favor de agregar usuario"); form1.usuario.focus(); return false; }
	if(pass == "" || pass.length < 2) { alert("Favor de agregar password"); form1.password.focus(); return false; }
	if(pass2 == "" || pass2.length < 2) { alert("Favor de ingresar otra ves el password"); form1.repassword.focus(); return false; }
	if(pass != pass2){ 
		alert("Lo sentimos los password no coinciden"); 
		form1.password.focus(); 
		form1.password.value = ""; 
		form1.repassword.value = ""; 
		return false; 
	}
	if(email == "" || email.length < 2) { alert("Favor de agregar un correo"); form1.email.focus(); return false; }
	if (!re.test(email)) { alert( "PLEASE ENTER A VALID EMAIL"); form1.email.focus(); return (false); } 
	
	alert("Se Agrego el Usuario con Exito");
	form1.name.focus();

}
function relowed(){
	var servicio = document.form2.service.value;
	if(servicio == 'soporte') { document.location.href="index.php?service=soporte&user=Carras27"; }
	if(servicio == 'diseno') { document.location.href="index.php?service=diseno&user=Carras27"; }
	if(servicio == 'software') { document.location.href="index.php?service=software&user=Carras27"; }
	if(servicio == 'calidad') { document.location.href="index.php?service=calidad&user=Carras27"; }
	if(servicio == 'todos') { document.location.href="index.php?service=todos&user=Carras27"; }
}
</script>

<title>Untitled Document</title>

</head>
<body>
	<div id="title">
    	<h1 align="center" style="padding-top:30px;"> Zoetux.com </h1>
    </div>
    <br/>
    
   	<div id="button">
  		<ul>
    		<li><a href="../index.php">Home</a></li>
    		<li><a href="ctrluser.php?user=<? echo $user; ?>">Ctrl Usuarios</a></li>
    		<li><a href="#">Ctrl Proyectos</a></li>
            <li><a href="registrar.php">Agregar Usuario</a></li>
    		<li><a href="#">Proyectos Usuario</a></li>
    		<li><a href="#">Ctrl Imagenes</a></li>
    		<li><a href="#">Calendario Proyectos</a></li>
    		<li> 
            <form action="#" method="post" name="form2">
            <table>
            	<tr><td width="10px"></td>
                <td><select id="service" name="service" onChange="relowed()" >
                	<option value="" selected="selected"><span>Todos los Servicios</span></option>
                    <option value="soporte"><span>Soporte Tecnico</span></option>
                    <option value="diseno"><span>Diseño Grafico</span></option>
                    <option value="software"><span>Desarrollo de Software</span></option>
                    <option value="calidad"><span>Control de Calidad</span></option>
                </select></td></tr></table>
            </form>
            </li>
  		</ul>
    </div>
    
    <div id="central">
    	<form name="form1" action="registrar.php?user=<? echo $user; ?>" method="post" onSubmit = "return validar()" >  
    <br/>   
		<table width="500" align="center" >
    		<tr>
       			<td colspan="3" align="center"><h2><b>Registro de Usuarios del Sistema</b></h2></td>
    		</tr>
    		<tr align="justify" >
    			<td width="130" height="50"><p class="loginp">Nombre de usuario:</p></td>
                <td><input type="text" name="name" size="30" placeholder="nombre"  /></td>
    			<td width="30"><img src="../images/usuario_icono.png" /></td>
    		</tr>
            <tr align="justify" >
    			<td width="130" height="50"><p class="loginp">User:</p></td>
                <td><input type="text" name="usuario" size="30"  placeholder="usuario"  /></td>
    			<td width="30"><img src="../images/usuario_icono.png" /></td>
    		</tr>
    		<tr>
    			<td height="50" align="justify"><p class="loginp">Contrase&ntilde;a:</p></td>
    			<td><p><input name="password" id="password" type="password" size="30"  placeholder="password"  /></p></td>
    			<td rowspan="2"><img src="../images/llaves.gif" /></td>
    		</tr>
    		<tr>
    			<td align="justify" height="50"><p class="loginp">Repetir Contrase&ntilde;a:</p></td>
    			<td><p><input name="repassword" type="password" size="30"  placeholder="repetir password"  /></p></td>
		    </tr>
    		<tr>
    			<td align="justify" height="50"><p class="loginp">Correo Electr&oacute;nico:</p></td>
    			<td><p><input name="email" type="email" size="30" placeholder="Agregar email" /></p></td>
				<td><img src="../images/icono_email.png" /></td>
    		</tr>
    		<tr>
    			<td colspan="3" align="right"><p><input name="submit" type="submit" value="Registrar" /></p></td>
    		</tr>
    	</table>
	 </form>
    </div>
    
</body>
</html>
	
    