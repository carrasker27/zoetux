<?
//agregamos los php de la conexion a la base de datos
require_once '../db/conexion.php';
require_once '../db/config.php';

//obtenemos la variable de conexion
$dbConn=conectar();

if(!empty($_GET['id'])){
$id_user = $_GET['id'];
$name = $_GET['nombre'];
$user = $_GET['usuario'];
$email = $_GET['email'];
$tipo = $_GET['tipocuenta'];
}

if(!empty($_REQUEST['submit'])){
	
	$id_user = $_REQUEST['id'];
	
	$query = "DELETE FROM `usuarios` WHERE capa_idusuario ='$id_user'";
				
    $result = mysql_query($query, $dbConn);
	die();

}

?>
<!DOCTYPE html >
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../js/capafunction.js"></script>

</head>

<body>
<form name="form1" action="eliminar_usuario.php" method="post">
	<table width="500" align="center" >
    		<tr>
       			<td colspan="3" align="center"><h2><b>Modificacion de Usuarios del Sistema</b></h2></td>
    		</tr>
    		<tr align="justify" >
    			<td width="130" height="50"><p class="loginp">Nombre de usuario:</p></td>
                <td><input type="text" name="name" size="30" value="<?= $name;?>" disabled="disabled"  /></td>
    			<td width="30"><img src="../images/usuario_icono.png" /></td>
    		</tr>
            <tr align="justify" >
    			<td width="130" height="50"><p class="loginp">User:</p></td>
                <td><input type="text" name="usuario" size="30"  value="<?= $user;?>"  disabled="disabled"/></td>
    			<td width="30"><img src="../images/usuario_icono.png" /></td>
    		</tr>
    		<tr>
    			<td align="justify" height="50"><p class="loginp">Correo Electr&oacute;nico:</p></td>
    			<td><p><input name="email" type="email" size="30"  value="<?= $email;?>" disabled="disabled"/></p></td>
				<td><img src="../images/icono_email.png" /></td>
    		</tr>
            <tr>
    			<td align="justify" height="50"><p class="loginp">Tipo de Cuenta:</p></td>
    			<td><p> <select name="tcuenta" disabled="disabled">
                		<option value="<?= $tipo;?>" selected><?= $tipo;?></option>
                		<option value="admin">admin</option>
                        <option value="comun">comun</option>
                        </select>
                   </p>
                </td>
 
    		</tr>
    		<tr>
    			<td colspan="3" align="right"><p><input name="submit" type="submit" value="Eliminar" onClick="closepage('Se ha Eliminado Correctamente')" /></p></td>
    		</tr>
            <input type="hidden" name="id" value="<?= $id_user;?>" >
    	</table>
</form>
</body>
</html>