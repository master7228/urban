<?php
session_start(); // Iniciar la sesión

// Establecer una variable de sesión
$_SESSION['mensaje'] = "Hola, esta es una variable de sesión.";

// Redirigir a la página 2
header('Location: pagina2.php');
exit;
?>
