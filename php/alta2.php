<? 
include("security.php");
include("conexion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?
	$nombre = strtoupper($_POST['nombre']);
	$no_pieza = strtoupper($_POST['no_pieza']);
	$descripcion = strtoupper($_POST['descripcion']);
	
	$paso = "nombre=".$nombre."&no_pieza=".$no_pieza."&descripcion=".$descripcion;
	
	$sel = "SELECT no_pieza FROM refacciones WHERE no_pieza = '$no_pieza'";
	conecta();
	$se = mysql_query($sel);
	desconecta();
	if(mysql_num_rows($se)>0){echo "YA EXISTE LA PIEZA $no_pieza"; exit("<meta http-equiv='refresh' content='2;URL=alta.php?$paso'>");}


	$fecha_hoy = date("Y-n-j");
	$hora_hoy = date("H:i:s");
	$alta = "INSERT INTO refacciones (nombre,no_pieza,descripcion) VALUES ('$nombre','$no_pieza','$descripcion')";
	$histo = "INSERT INTO historial (usuario_sdr,descripcion,fecha,hora,tipo,nombre,no_pieza) VALUES ('$usuario','ALTA DE $nombre NO. PIEZA $no_pieza','$fecha_hoy','$hora_hoy','ALTA','$nombre','$no_pieza')";
	
	conecta();
	if(!mysql_query($histo)){ desconecta(); exit("Error de conexion, contacte a Sistemas.");}
	desconecta();
	
	conecta();
	if(mysql_query($alta)){?> Dado de Alta Satisfactoriamente.<? } else { desconecta(); exit("Error de conexion, contacte a Sistemas.");}
	desconecta();
?>

	<meta http-equiv="refresh" content="2;URL='alta.php?nombre=beto&no_pieza=beto&descripcion=beto'">
</body>
</html>