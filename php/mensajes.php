<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style type="text/css">
body{
font-family:Arial, Helvetica, sans-serif; 
font-size:13px;
}
.info, .success, .warning, .error, .validation {
border: 1px solid;
margin: 10px 0px;
padding:15px 10px 15px 50px;
background-repeat: no-repeat;
background-position: 10px center;
}
.info {
color: #00529B;
background-color: #BDE5F8;
background-image: url('info.png');
}
.success {
color: #4F8A10;
background-color: #DFF2BF;
background-image:url('PALOMITA.png');
}
.warning {
color: #9F6000;
background-color: #FEEFB3;
background-image: url('warning.png');
}
.error {
color: #D8000C;
background-color: #FFBABA;
background-image: url('errorsito.png');
}
</style>
</head>

<body>
<? 
	
	$d = $_GET['de'];
	if($d == '3'){
?>
  <div class="info">Info message</div>
<? }elseif($d == '1'){?>
<div class="success">Usuario Correcto</div>
<meta http-equiv="refresh" content="2;URL='index.html'">
<? }elseif($d=='4'){?>
<div class="warning">Warning message</div>
<? }elseif($d=='2'){?>
<div class="error">Usuario Incorrecto</div>
<meta http-equiv="refresh" content="2;URL='user_index.php'">
<? }else{exit("Error");}?>
</body>
</html>