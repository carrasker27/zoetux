<? 
include("security.php");
include("conexion.php");?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CSS3 form design</title>
<style type="text/css" media="screen">

body { font-family:Arial, Helvetica, sans-serif; font-size:13px; }

#wrapper { margin:10px auto; width:960px;  }

h1 { margin:0px; padding:5px 0px; }

#form-container {
	background:#F9F9F9;
	
	border: solid 1px #ddd;
	
	border-radius:10px;

	-moz-border-radius: 10px; 
	
	-webkit-border-radius: 10px;
	
	box-shadow: 0px 0px 10px #888;
	
	-moz-box-shadow: 0px 0px 10px #888;
	
	-webkit-box-shadow: 0px 0px 10px #888;
	
	margin:0px auto;
	
	padding:15px;
	
	width:500px;
}

#form-container h2 { font-size:18px; color:#333; padding:0px; margin:0px 0px 10px 0px; }

fieldset, form { padding:0px; margin:0px; border:none }

#form-container .field  { clear:both; margin:0px; padding:10px 0px; }

label { width:120px; }

input[type=text], textarea {
	
	background:#fff;
	
	border:solid 1px #E5E5E5; 
	
	border-radius:5px;

	-moz-border-radius: 5px; 
	
	-webkit-border-radius: 5px;
	
	width:250px; 
}
textarea { height:120px }

label, input[type=text], textarea { padding:9px 5px; float:left }

input[type=text]:focus, textarea:focus { background:#EDF3FC; padding:8px 5px; border:solid 2px #D5E3F9; }

.submit-button { 
	background: #57A02C;
	
	border:solid 1px #86CC50;
	
	border-radius:5px;

		-moz-border-radius: 5px; 
		
		-webkit-border-radius: 5px;
	
	color:#FFF;
	
	cursor:pointer;
	
	font-size:13px;
	
	margin-left:130px;
	
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
select {
	
font-family: 'trebuchet MS', sans-serif;
color: #333;
font-size: 14px;
font-weight: bold;
letter-spacing: 0pt;

}

</style>

</head>

<body>

<div id="wrapper">
  <h1>&nbsp;</h1>
  <div id="form-container">
  	<h2>Existencia de Refacciones</h2>
    <form action="existencia2.php" method="post" id="form1">
  	<fieldset>      	
        <div class="field">
          <label for="Email">Nombre:</label>
         <? 
		 	conecta();
		 	nombres("nombre");
			desconecta();
		?>       
        </div>
 
 
       
         
        <div class="field">
        	<label for="Email">No. Pieza</label>
           <? 
		 	conecta();
		 	piezas("pieza");
			desconecta();
		?> 
            
          
        </div>
            
        <div class="field">
          <input type="submit" value="Enviar" class="submit-button" />
        </div>
        
      
    </fieldset>
	</form>    
  </div>
</div> 

</body>
</html>
