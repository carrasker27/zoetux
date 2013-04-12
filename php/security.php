<? //session_register();
session_start();
//conecto con la base de datos		
$conexion = mysql_connect("localhost", "zoetuxco_root", "9Js0V8uc5h") or die ('No puedo conectar con la base de datos por que: '. mysql_error());
//selecciono la BD
mysql_select_db ("zoetuxco_web", $conexion);

//Sentencia SQL para buscar un usuario con esos datos
$ssql = "SELECT * FROM usuarios WHERE (usuario='".$_SESSION['usuario']."' and password='".$_SESSION['pass']."') and usuario!=''";

//Ejecuto la sentencia
$rs = mysql_query($ssql,$conexion);
$row = mysql_fetch_assoc($rs);

$nombre=$row['nombre'];
$paterno=$row['apellido_paterno'];
$materno=$row['apellido_materno'];
$nombre_completo=$row['nombre_completo'];
$mi_email=$row['email'];

$usuario=$_SESSION['usuario'];
$_SESSION['nombre_completo']=$nombre_completo;
$_SESSION['nombre'] = $nombre;
$_SESSION['paterno'] = $paterno;
$_SESSION['materno'] = $materno;
$_SESSION['usuario']=$usuario;
$_SESSION['email']=$mi_email;
echo mysql_error();

if (mysql_num_rows($rs)==0){

	mysql_close();
	header("Location: mensajes.php?de=2");

	}
mysql_close();

?>







