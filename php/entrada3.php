<? 
include("security.php");
include("conexion.php");

	$obj = $_POST['selec'];
	$cantidad = $_POST['cantidad'];
	
	if(!is_numeric($cantidad)){exit("Ingrese una cantidad numerica");}

	$sel = "SELECT existencia,nombre,no_pieza FROM refacciones WHERE id = '$obj'";	
	conecta();
	$se = mysql_query($sel);
	desconecta();
	$s = mysql_fetch_assoc($se);
	
	$i = 0;
	$i = $s['existencia'] + $cantidad;
	
	$fecha_hoy = date("Y-n-j");
	$hora_hoy = date("H:i:s");
	
	$mete = "UPDATE refacciones SET existencia = '$i' WHERE id = '$obj'";
	$histo = "INSERT INTO historial (usuario_sdr,descripcion,fecha,hora,tipo,cantidad,nombre,no_pieza) VALUES ('$usuario','ENTRADA A $cantidad $s[nombre] NO. PIEZA $s[no_pieza]','$fecha_hoy','$hora_hoy','ENTRADA','$cantidad','$s[nombre]','$s[no_pieza]')";
	
	
	
	conecta();
	if(mysql_query($mete) && mysql_query($histo))
	{
		echo "Se dio ENTRADA satisfactoriamente";
	}else
	{
		echo "No se pudo dar ENTRADA satisfactoriamente.";
	}
	desconecta();
?>
	<meta http-equiv="refresh" content="3;URL='entrada1.php'">
	

