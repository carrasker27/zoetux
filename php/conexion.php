<?
function conecta() {
	$db = mysql_connect("localhost", "zoetuxco_root", "9Js0V8uc5h") or die ('No puedo conectar con la base de datos por que: '. mysql_error());
	
	mysql_select_db ("zoetuxco_web", $db);
}

function desconecta(){ mysql_close();}

function nombres($select){
mysql_query("SET names utf8");
	$puesto = mysql_query("SELECT DISTINCT(nombre) FROM refacciones ORDER BY nombre");
	?> <select name="<? echo $select;?>"><option value=""></option><?
	while($row = mysql_fetch_assoc($puesto)){
	echo '<option value="'.$row['nombre'].'">'.$row['nombre'].'</option>';
	};
	?></select><?
}

function piezas($select){
mysql_query("SET names utf8");
	$puesto = mysql_query("SELECT DISTINCT(no_pieza) FROM refacciones ORDER BY no_pieza");
	?> <select name="<? echo $select;?>"><option value=""></option><?
	while($row = mysql_fetch_assoc($puesto)){
	echo '<option value="'.$row['no_pieza'].'">'.$row['no_pieza'].'</option>';
	};
	?></select><?
}

function usuarios($select){
mysql_query("SET names utf8");
	$puesto = mysql_query("SELECT DISTINCT(usuario) FROM usuarios ORDER BY usuario");
	?> <select name="<? echo $select;?>"><option value=""></option><?
	while($row = mysql_fetch_assoc($puesto)){
	echo '<option value="'.$row['usuario'].'">'.$row['usuario'].'</option>';
	};
	?></select><?
}

?>