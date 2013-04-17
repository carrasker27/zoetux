<?
//agregamos los php de la conexion a la base de datos
require_once '../db/conexion.php';
require_once '../db/config.php';

//obtenemos la variable de conexion
$dbConn=conectar();
//inicializacion de variable para que no marque error
$user = $_REQUEST['user'];
//condicion del query dependiendo del tipo de servicio a mostrar por default muestra todos los avisos
$query = "SELECT * FROM `usuarios` Order by `capa_idusuario` ASC";
				
$result = mysql_query($query, $dbConn);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../css/admin.css" rel="stylesheet" />
<script src="../js/capafunction.js"></script>
<title>Untitled Document</title>
<script>
function relowed(){
	var servicio = document.form1.service.value;
	if(servicio == 'soporte') { document.location.href="index.php?service=soporte&user=Carras27"; }
	if(servicio == 'diseno') { document.location.href="index.php?service=diseno&user=Carras27"; }
	if(servicio == 'software') { document.location.href="index.php?service=software&user=Carras27"; }
	if(servicio == 'calidad') { document.location.href="index.php?service=calidad&user=Carras27"; }
	if(servicio == 'todos') { document.location.href="index.php?service=todos&user=Carras27"; }
}
</script>

</head>
<body>
	<div id="title">
    	<h1 align="center" style="padding-top:30px;"> C.A.P.A TI - IV SERVICIOS </h1>
    </div>
    <br/>
    
   	<div id="button">
  		<ul>
    		<li><a href="../index.php">Home</a></li>
    		<li><a href="ctrluser.php?user=<? echo $user; ?>">Ctrl Usuarios</a></li>
    		<li><a href="#">Ctrl Proyectos</a></li>
            <li><a href="registrar.php?user=<? echo $user; ?>">Agregar Usuario</a></li>
    		<li><a href="#">Proyectos Usuario</a></li>
    		<li><a href="#">Ctrl Imagenes</a></li>
    		<li><a href="#">Calendario Proyectos</a></li>
    		<li> 
            <form action="#" method="post" name="form1">
            <table>
            	<tr><td width="10px"></td>
                <td><select id="service" name="service" onChange="relowed()" >
                	<option value="todos" selected="selected"><span>Todos los Servicios</span></option>
                    <option value="soporte"><span>Soporte Tecnico</span></option>
                    <option value="diseno"><span>Diseño Grafico</span></option>
                    <option value="software"><span>Desarrollo de Software</span></option>
                    <option value="calidad"><span>Control de Calidad</span></option>
                </select></td></tr></table>
               <!-- <input type="submit" name="submit" value="Enviar" /> -->
            </form>
            </li>
  		</ul>
    </div>
    
    <div id="central">
    	<table width="100%">
        	<tr><td colspan="7" align="center"><h1>CONTROL DE USUARIOS</h1></td></tr>
           	<tr align="center" bgcolor="#000000">
                <td><span class="span">Id_Usuario</span></td>
                <td><span class="span">Nombre</span></td>
                <td><span class="span">Usuario</span></td>
                <td><span class="span">Correo</span></td>
                <td><span class="span">Tipo de Usuario</span></td>
                <td><span class="span">Modificar Usuario</span></td>
                <td><span class="span">Eliminar Usuario</span></td>
           </tr>
           <?	while ($row = mysql_fetch_assoc($result)) {	   ?>
               <tr align="center" bgcolor="#CCCCCC" >
                <td><span class="textmysql"><?= $row['capa_idusuario']; ?></span></td>
                <td><span class="textmysql"><?= $row['capa_nombre']?></span></td>
                <td><span class="textmysql"><?= $row['capa_usuario']; ?></span></td>
                <td><span class="textmysql"><?= $row['capa_email']; ?></span></td>
                <td><span class="textmysql"><?= $row['capa_tipo']; ?></span></td>
                <? $paso= "id=".$row['capa_idusuario']."&nombre=".$row['capa_nombre']."&usuario=".$row['capa_usuario']."&email=".$row['capa_email']."&tipocuenta=".$row['capa_tipo']; ?>
                <td><span class="textmysql"><a href="#" onClick="newpage('modificar_usuario.php?<?= $paso; ?>')">Modificar</a></span></td>
                <td><span class="textmysql"><a href="#" onClick="newpage('eliminar_usuario.php?<?= $paso; ?>')">Eliminar</a></span></td>
           </tr>
           <? } ?>
            
        </table>
    </div>
    
</body>
</html>