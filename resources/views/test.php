<?php

$to = 'contacto@ervinortizpropiedades.cl';
$subject = 'Prueba de Correo';
$message = 'Este es un correo de prueba';
$headers = 'From: contacto@ervinortizpropiedades.cl' . "\r\n" .
    'Reply-To: contacto@ervinortizpropiedades.cl' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

if (mail($to, $subject, $message, $headers)) {
    echo 'Correo enviado correctamente.';
} else {
    echo 'Error al enviar el correo.';
}
?>
