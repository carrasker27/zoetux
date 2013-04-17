<?php

function esUsuario ($usuario, $password, $conexion)
{
	//verificamos los campos que esten total mente completos 
	
	if($usuario=='' || $password=='') return false;
	
	//buscamos los datos para poder ingresar
	
	$query= "SELECT zoetux_idusuario,zoetux_usuario,zoetux_password,zoetux_tipo FROM usuarios_zoetux WHERE zoetux_usuario='$usuario'";
	
	$resultado= mysql_query ($query, $conexion);
	
	$row= mysql_fetch_array($resultado);
	
	     $password_from_db=$row['zoetux_password'];
		 
		 unset($query);
		 
		 //verificamos que coincida el password de la base de datos con el que ingresan
		 
		 if($password_from_db==$password)
		 {
			 return $row;
		 }
		 else
		 {
			 return false;
		 }
		 
}
?>