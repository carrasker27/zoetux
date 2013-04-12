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
	$i = $s['existencia'] - $cantidad;
	
	if($i < 0){exit("STOCK INSUFICIENTE <meta http-equiv='refresh' content='3;URL=http:salida1.php'>");}
	
	$mete = "UPDATE refacciones SET existencia = '$i' WHERE id = '$obj'";
	
	$fecha_hoy = date("Y-n-j");
	$hora_hoy = date("H:i:s");
	$histo = "INSERT INTO historial (usuario_sdr,descripcion,fecha,hora,tipo,cantidad,nombre,no_pieza) VALUES ('$usuario','SALIDA A $cantidad $s[nombre] NO. PIEZA $s[no_pieza]','$fecha_hoy','$hora_hoy','SALIDA','$cantidad','$s[nombre]','$s[no_pieza]')";
	
	conecta();
	if(!mysql_query($histo)){echo "No se pudo dar SALIDA satisfactoriamente(HISTORIAL).";}
	desconecta();
	
	conecta();
	if(mysql_query($mete)){echo "Se dio SALIDA satisfactoriamente";}else{echo "No se pudo dar SALIDA satisfactoriamente.";}
	desconecta();
	
?>
	<meta http-equiv="refresh" content="3;URL='http:salida1.php'">