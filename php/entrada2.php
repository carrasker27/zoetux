<? 
include("security.php");
include("conexion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Arpisa</title>
<style type="text/css">

#table-2 {
	border: 1px solid #e3e3e3;
	background-color: #f2f2f2;
        width: 100%;
	border-radius: 6px;
	-webkit-border-radius: 6px;
	-moz-border-radius: 6px;
}
#table-2 td, #table-2 th {
	padding: 5px;
	color: #333;
}
#table-2 thead {
	font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
	padding: .2em 0 .2em .5em;
	text-align: left;
	color: #4B4B4B;
	background-color: #C8C8C8;
	background-image: -webkit-gradient(linear, left top, left bottom, from(#f2f2f2), to(#e3e3e3), color-stop(.6,#B3B3B3));
	background-image: -moz-linear-gradient(top, #D6D6D6, #B0B0B0, #B3B3B3 90%);
	border-bottom: solid 1px #999;
}
#table-2 th {
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	font-size: 17px;
	line-height: 20px;
	font-style: normal;
	font-weight: normal;
	text-align: left;
	text-shadow: white 1px 1px 1px;
}
#table-2 td {
	line-height: 20px;
	font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
	font-size: 14px;
	border-bottom: 1px solid #fff;
	border-top: 1px solid #fff;
}
#table-2 td:hover {
	background-color: #fff;
}
.submit-button { 
	background: #57A02C;
	
	border:solid 1px #86CC50;
	
	border-radius:5px;

		-moz-border-radius: 5px; 
		
		-webkit-border-radius: 5px;
	
	color:#FFF;
	
	cursor:pointer;
	
	font-size:13px;
	
	margin-left:1px;
	
	padding:3px 8px;
}
.submit-button:hover { background:#82D051 }

.error {background: #ffcece; border:solid 1px #df8f8f; }

.success {background: #d5ffce; border:solid 1px #9adf8f; }

.error, .success {
	
	border-radius:5px;

		-moz-border-radius: 5px; 
		
		-webkit-border-radius: 5px;
		
	color:#333;
	
	padding:9px;
	
	margin-bottom:10px;
}
</style>
</head>

<body>
<? 
	$nombre = $_POST['nombre'];
	$pieza = $_POST['pieza'];
	$co="";
	if($nombre!=''){
		$co.=" AND nombre='$nombre'";
	}
	if($pieza!=''){
		$co.=" AND no_pieza='$pieza'";
	}
	$tra = "SELECT * FROM refacciones WHERE id > '0'".$co;
	conecta();
	$tr = mysql_query($tra);
	desconecta();
	$c=0;
?>
<form action="entrada3.php" method="post">
<table id="table-2">
	<thead>
		<th>No. pieza</th>
		<th>Nombre</th>
		<th>Descripcion</th>
        <th>Existencia</th>
		<th>Seleccionar</th>
	</thead>
	<tbody>
    <? while($t = mysql_fetch_assoc($tr)){?>
		<tr>
			<td><? echo $t['no_pieza'];?></td>
			<td><? echo $t['nombre'];?></td>
			<td><? echo $t['descripcion'];?></td>
            <td><? echo $t['existencia'];?></td>
			<td><input type="radio" name="selec" value="<? echo $t['id'];?>"></td>
		</tr>
        <? 
		
		}?>
        <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td><input type="text" name="cantidad" value="Cantidad" onfocus="this.className='inputclass';if (this.value == 'Cantidad') {this.value = '';}" onblur="this.className='inputs';if (this.value == '') {this.value = 'Cantidad';}"></td>
		</tr>
         <tr>
			<td>&nbsp;</td>
			<td>&nbsp;</td>
			<td>&nbsp;<!--<input type="text" onblur="this.value = cantidad.value;" onfocus="this.value = cantidad.value;" onchange="this.value = cantidad.value;" onclick="this.value = cantidad.value;" ondblclick="this.value = cantidad.value;" onkeydown="this.value = cantidad.value;" onkeypress="this.value = cantidad.value;" onkeyup="this.value = cantidad.value;" onmousedown="this.value = cantidad.value;" onmousemove="this.value = cantidad.value;" onmouseout="this.value = cantidad.value;" onmouseover="this.value = cantidad.value;" onmouseup="this.value = cantidad.value;" onselect="this.value = cantidad.value;" />--></td>
			<td> <input type="submit" value="Siguiente" class="submit-button"/></td>
		</tr>
       
	</tbody>
</table>
</form>
</body>
</html>