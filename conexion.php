<?php
    $host = 'localhost';
    $db = 'canineworld';
    $user = 'root';
    $password = '';

    try {
        // Crear una conexión PDO
        $conexion = new PDO("mysql:host=$host;dbname=$db", $user, $password);

        // Configurar el modo de error y excepciones
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        // Manejar errores de conexión
        echo "Error de conexión: " . $e->getMessage();
        die();  // Detener la ejecución del script en caso de error
    }
?>
