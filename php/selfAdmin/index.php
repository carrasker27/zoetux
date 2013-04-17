<?
//agregamos los php de la conexion a la base de datos

require_once '../db/conexion.php';
require_once '../db/config.php';

//obtenemos la variable de conexion
$dbConn=conectar();
//inicializacion de variable para que no marque error
$service = "";
$user = $_REQUEST['user'];
$email = $_REQUEST['email'];
$pass = $_REQUEST['pass'];

//$pasoBeto = "mail=" . $email . "&pas=" .$pass;
//echo $pasoBeto;
//condicion del query dependiendo del tipo de servicio a mostrar por default muestra todos los avisos

$query = "SELECT * FROM avisos WHERE tipo_avisos !='$service'";
if(!empty($_REQUEST['service']))
	{
		$service = $_REQUEST['service'];
		$query = "SELECT * FROM avisos WHERE tipo_avisos ='$service'" ;
	}
				
$result = mysql_query($query, $dbConn);

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../css/admin.css" rel="stylesheet" />
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
    	<h1 align="center" style="padding-top:30px;"> ZoeTux.com </h1>
    </div>
    <br/>
    
   	<div id="button">
  		<ul>
    		<li><a href="../index.html">Home</a></li>
    		<li><a href="ctrluser.php?user=<? echo $user; ?>">Ctrl Usuarios</a></li>
    		<li><a href="#">Ctrl Proyectos</a></li>
        <li><a href="registrar.php?user=<? echo $user; ?>">Agregar Usuario</a></li>
    		<li><a href="#">Proyectos Usuario</a></li>
    		<li><a href="#">Ctrl Imagenes</a></li>
    		<li><a href="#">Calendario Proyectos</a></li>
        <li><a href="../mensajes.php?de=1">Ctrl Inventarios Beto</a></li>
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
        	<tr><td colspan="5" align="center"><h1>NOTIFICACIONES DEL DIA </h1></td></tr>
           	<tr align="center" bgcolor="#000000">
                <td><span class="span">id_Aviso</span></td>
                <td><span class="span">Tipo de Aviso</span></td>
                <td><span class="span">Fecha de Publicacion</span></td>
                <td><span class="span">Detalles de Aviso</span></td>
                <td><span class="span">Ver Detalle Completo</span></td>
           </tr>
           <?	while ($row = mysql_fetch_assoc($result)) {	   ?>
               <tr align="center" bgcolor="#CCCCCC" >
                <td><span class="textmysql"><?= $row['id_avisos']; ?></span></td>
                <td><span class="textmysql"><?= $row['tipo_avisos']; ?></span></td>
                <td><span class="textmysql"><?= $row['fecha_avisos']; ?></span></td>
                <td><span class="textmysql"><?= $row['detalles_avisos']; ?></span></td>
                <td><span class="textmysql"><a href="#">Detalles Completo</a></span></td>
           </tr>
           <? } ?>
            
        </table>
    </div>
    
</body>
</html>