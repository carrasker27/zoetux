<?php
	
	$name = $_POST['name'];
	$mail = $_POST['usremail'];
	$empresa = $_POST['empresa'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['msg'];


    //Recuperar los datos que serviran para enviar el correo
     $seEnvio;      //Para determinar si se envio o no el correo
     $destinatario = 'hcarrasco@zoetux.com';        //A quien se envia
     $elmensaje = str_replace("\n.", "\n..", $mensaje);     //por si el mensaje empieza con un punto ponerle 2
     $elmensaje = wordwrap($elmensaje, 70);                       //dividir el mensaje en trozos de 70 cols
     //Recupear el asunto
     $asunto = "Informacion " . $empresa;
     //Formatear un poco el texto que escribio el usuario (asunto) en la caja
     //de comentario con ayuda de HTML
	$cuerpomsg ='
		<html>
			<head>
				<title>Tienes un mensaje!!</title>
			</head>
			<body>
				<p>Holaa Gonza, alguien te mando un mensaje de tu pagina web http://gonzaslive.aegislinux.com.mx</p>
				<table>
					<tr>
						<td><b>Tu mensaje es:</b><br></td>
					</tr>
					<tr>
						<td>'.$elmensaje.'</td>
					</tr>
					<tr>
						<td><br><a href="http://gonzaslive.aegislinux.com.mx/ejemplos/enviar_correo/responder.php?correo='.$_POST['elcorreo'].'&asunto=FW: '.$asunto.'&nombre='.$_POST['nombr'].'">Responder</a></td>
					</tr>
				</table>
			</body>
		</html>
		';
//Establecer cabeceras para la funcion mail()
    //version MIME
    $cabeceras = "MIME-Version: 1.0\r\n";
    //Tipo de info
    $cabeceras .= "Content-type: text/html; charset=iso-8859-1\r\n";
    //direccion del remitente
    $cabeceras .= "From: ".$name." <".$mail.">";
    if(mail($destinatario,$asunto,$cuerpomsg,$cabeceras))
        $seEnvio = true;
    else
        $seEnvio = false;
 
//Enviar el estado del envio (por metodo GET ) y redirigir navegador al archivo index.php
        if($seEnvio == true)
    {
        header('Location: ../index_new.html');
    }
?>
