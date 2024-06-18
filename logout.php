<?php
    session_start();
    
    // Borramos las variables de sesión
    session_unset();

    // Destruimos la sesión
    session_destroy();

    // Eliminar la cookie de sesión
    setcookie(session_name(), null, time() - 1000); // eliminar la cookie

    // Redirigimos al usuario al formulario de login
    header("Location: usuario.php");

    // Salimos del script
    exit();
?>