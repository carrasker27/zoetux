<?
	
$conexion = mysql_connect("localhost", "zoetuxco_root", "9Js0V8uc5h") or die ('No puedo conectar con la base de datos por que: '. mysql_error());

mysql_select_db ("zoetuxco_web", $conexion);

$ssql = "SELECT * FROM usuarios WHERE usuario='".$_POST['email']."' and password='".$_POST['pass']."'";

$rs = mysql_query($ssql);

echo mysql_error();

if (mysql_num_rows($rs)==1) {
//session_register();
session_start();
$_SESSION['autentificado'] = "SI";
$_SESSION['usuario']=strtolower($_POST['email']);
$_SESSION['pass']=$_POST['pass'];

$row = mysql_fetch_assoc($rs);

$referencia="mensajes.php?de=1";
 
 mysql_close();      
	header("Location: $referencia");
}else{
	 mysql_close();   

	header("Location: mensajes.php?de=2");
}
 mysql_close();   
?>