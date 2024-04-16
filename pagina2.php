<?php
session_start(); // Iniciar la sesión

// Recuperar la variable de sesión
$mensaje = isset($_SESSION['mensaje']) ? $_SESSION['mensaje'] : "La variable de sesión no está definida.";

// Eliminar la variable de sesión (opcional)
// unset($_SESSION['mensaje']);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Prueba de Variable de Sesión</title>
</head>
<body>
    <h1>Prueba de Variable de Sesión</h1>
    <p>Mensaje de la variable de sesión:</p>
    <p><?php echo $mensaje; ?></p>
</body>
</html>
