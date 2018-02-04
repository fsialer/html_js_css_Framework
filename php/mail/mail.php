 <?php

include_once("PHPMailer-master/class.phpmailer.php");
    include_once("PHPMailer-master/class.smtp.php");
    $mail = new PHPMailer(); //creo un obejto de tipo phpmailer
    $mail->IsSMTP(); //protocolo stmp
    $mail->SMTPAuth = true; //autenticacio en el smtp
    $mail->SMTPSecure = "ssl"; //SSL security en el stmp
    $mail->Host = "smtp.gmail.com"; //servidor de smtp de gmail
    $mail->Port = 465; //puerto sehguro del servidor smtp de gmail
    $mail->From = "hpichenf@crece.uss.edu.pe";
    $mail->AddAddress("hpichenf@crece.uss.edu.pe");
    $mail->Username = "hpichenf@crece.uss.edu.pe"; //aqui por tu correo de gmail
    $mail->Password = "HPICHENF"; //aqui es el password
    $mail->Subject="asunto";//asunto del correo
    $mail->Body="mensaje";
    $mail->WordWrap=50;//n° de columnas
    $mail->MsgHTML("mensaje");//se indica el cuerpo del mensaje
   
    if ($mail->Send()) {//enviamos el correo PHPMAILER
        echo 'mensaje enviado con exito;';        
    }else{
        echo 'El menjae no se pudo mandar';
        echo 'Error:'.$mail->ErrorInfo;
    }
        
