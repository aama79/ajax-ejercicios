<?php
if(isset($_POST)){
  error_reporting(0);

  $name = $_POST["name"];
  $email = $_POST["email"];
  $subject = $_POST["subject"];
  $comments = $_POST["comments"];
  
  $domain = $_POST["HTTP_HOST"];
  $to = "aama.79@gmail.com";
  $subject_mail = "Contacto desde el formulario del sitio $domain";
  $message = "
    <p>
      Datos envidaos desde el formulario del sitio <b>$domain</b>
    </p>
    <ul>
      <li>Nombre: <b>$name</b></li>
      <li>Email: <b>$email</b></li>
      <li>Asunto: <b>$subject</b></li>
      <li>Mensja: $comments</li>
    </ul>
  ";
$headers = "MIME-Version: 1.0\r\n" . "Content-Type: text/html; charset=utg-8\r\n" . "From: Envio Automatico No Responder! <no-reply@$domain>";

$send_mail = mail($to, $subject_mail, $message, $headers);

if($send_mail){
  $res = [
    "err" => false,
    "message" => "Tu mensaje a sido enviado"
  ];
} else {
  $res = [
    "err" => true,
    "message" => "Eror al enviar tu mensaje, intenta nuevamente!"
  ];
}

//header("Access-Control-Allow-Origin: https://jonmircha.com");
  header("Access-Control-Allow-Origin: *");
  header(`Content-type: application/json`);
  echo json_encode($res);

exit;
}