<?php
	
	$name = $_POST['name'];
	$mail = $_POST['usremail'];
	$empresa = $_POST['empresa'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['msg'];
	$asunto = $_GET['asunto'];
	
    //Recuperar los datos que serviran para enviar el correo
     $destinatario = 'hcarrasco@zoetux.com,info@zoetux.com';        //A quien se envia
     $elmensaje = str_replace("\n.", "\n..", $mensaje);     //por si el mensaje empieza con un punto ponerle 2
     $elmensaje = wordwrap($elmensaje, 70);                       //dividir el mensaje en trozos de 70 cols
     //Recupear el asunto
	 if($asunto==''){
     $asunto = "Informacion " . $empresa;
	 }else{$asunto == "PROMOCION CORREOS PARA ". $empresa;}
     $cuerpomsg =$elmensaje." telefono : ".$telefono."<br>".$empresa;
	//Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$name." <".$mail.">";
    if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras)){
        header('Location: ../index.html');
    }
    else{
    	echo "Correo no Enviado";
    	header('Location: informacion.html');
    }
?>
