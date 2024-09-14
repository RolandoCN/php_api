<?php


// Datos de conexión
$host = 'localhost'; // o tu host
$usuario = 'root'; // tu usuario
$clave = ''; // tu clave
$basededatos = 'ionic_crud'; // tu base de datos



try {
    // Crear conexión
    $dsn = "mysql:host=$host;dbname=$basededatos;charset=utf8";
    $opciones = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    ];
    
    $conexion = new PDO($dsn, $usuario, $clave, $opciones);
    
    // echo "Conexión exitosa a la base de datos MySQL.";
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}

// Cerrar conexión (PDO no requiere un cierre explícito, pero es una buena práctica)
//$conexion = null;
?>


