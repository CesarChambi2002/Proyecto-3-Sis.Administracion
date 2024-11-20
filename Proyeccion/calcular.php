<?php
session_start();
include ('../app/config.php');

// Recibir los datos del formulario
$meses = $_POST['meses'];

// Aquí se simula el cálculo de la proyección. Puedes implementar la regresión lineal o cualquier otro método.
$resultados_proyeccion = [];
for ($i = 1; $i <= $meses; $i++) {
    $ventas_proyectadas = rand(5000, 15000); // Ejemplo de datos generados
    $resultados_proyeccion["Mes $i"] = $ventas_proyectadas;
}

// Guardar los resultados en una variable de sesión
$_SESSION['resultados_proyeccion'] = $resultados_proyeccion;

// Redireccionar de vuelta al index de proyección de ventas
header("Location: ../index.php");

exit();
