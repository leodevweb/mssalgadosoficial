<?php
	$GetPost = filter_input_array(INPUT_POST, FILTER_DEFAULT); // RECUPERA AS INFO DO FORMULARIO
	
	
	$Nome =  $GetPost['nome'];
	$Email =  $GetPost['email'];// declara as variaveis locais
	$Telefone = $GetPost['telefone'];
	$Mensagem = $GetPost['msg'];


//incluir classes phpmailer
	 require("PHPMailer-master/src/PHPMailer.php");
  	 require("PHPMailer-master/src/SMTP.php");
  	 require("PHPMailer-master/src/Exception.php");


	$mail = new PHPMailer\PHPMailer\PHPMailer(true);                            // Passing `true` enables exceptions
	
	    //Server settings
	   // $mail->SMTPDebug = 2;                                 // Enable verbose debug output
	    $mail->isSMTP();                                      // Set mailer to use SMTP
	    $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
	    $mail->SMTPAuth = true;                               // Enable SMTP authentication
	    $mail->Username = 'leo.penkas@gmail.com';                 // SMTP username
	    $mail->Password = 'akatsuki2015';                           // SMTP password
	    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
	    $mail->Port = 587;                                    // TCP port to connect to

	    //Recipients
	    $mail->setFrom('leo.penkas@gmail.com');
	    $mail->addAddress('soarestecinfo@gmail.com');


	    //Content
	    $mail->isHTML(true);                                  // Set email format to HTML
	    $mail->Subject = 'Contato - Mssalgados@gmail.com';
	    $mail->Body    = "Nome: $Nome <br> Email:  $Email <br> Telefone:  $Telefone <br>  Mensagem: <br> $Mensagem";
   
    $mail->send();

    echo "<script type='text/javascript'>alert('Sua mensagem foi enviada com sucesso!');</script>";
	echo '<meta HTTP-EQUIV="Refresh" CONTENT="0; URL=contato.html">';
	exit;

?>