<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{
    public $email;
    public $nombre;
    public $token;
 
    public function __construct($email, $nombre, $token){
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;
    }
 
    public function enviarConfirmacion(){
        //Crear el objeto e email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '54813a02d8e75f';
        $mail->Password = 'bfb95210aea3d7';
 
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu Cuenta';
 
 
        //Usamos HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
 
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre ."</strong> has creado una cuenta en App salon, solo debes confrimala presionando el siguiente enlace</p>";
        $contenido .= "<p>Preciona aquí: <a href='http:localhost:3000/confirmar-cuenta?token=". $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido .= "<p>Si tu no solicitaste la creacion de esta cuenta ignora este mensaje</p>";
        $contenido .= "</html>";
 
        $mail->Body = $contenido;
 
        //Enviar el Email
        $mail->send();
    }

    public function enviarInstrucciones() {
        //Crear el objeto e email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = 'smtp.mailtrap.io';
        $mail->SMTPAuth = true;
        $mail->Port = 2525;
        $mail->Username = '54813a02d8e75f';
        $mail->Password = 'bfb95210aea3d7';
 
        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Reestablece tu password';
 
 
        //Usamos HTML
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';
 
        $contenido = "<html>";
        $contenido .= "<p><strong>Hola ". $this->nombre ."</strong> has solicitado reestablecer tu password, sigue el siguiente enlace para hacerlo</p>";
        $contenido .= "<p>Preciona aquí: <a href='http:localhost:3000/recuperar?token=". $this->token . "'>Reestablecer password</a> </p>";
        $contenido .= "<p>Si tu no solicitaste la creacion de esta cuenta ignora este mensaje</p>";
        $contenido .= "</html>";
 
        $mail->Body = $contenido;
 
        //Enviar el Email
        $mail->send();
    }
}

