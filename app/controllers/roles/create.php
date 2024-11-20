<?php

<<<<<<< HEAD

include ('../../config.php');

$rol = $_POST['rol'];

    $sentencia = $pdo->prepare("INSERT INTO tb_roles
       ( rol, fyh_creacion) 
VALUES (:rol,:fyh_creacion)");

    $sentencia->bindParam('rol',$rol);
    $sentencia->bindParam('fyh_creacion',$fechaHora);
    if($sentencia->execute()){
        session_start();
        $_SESSION['mensaje'] = "Se registro el rol de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles/');
    }else{
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/roles/create.php');
    }






=======
include ('../../config.php');

$rol = trim($_POST['rol']); // Limpiar espacios en blanco al inicio y final

// Comprobar si el rol ya existe en la base de datos
$consulta = $pdo->prepare("SELECT COUNT(*) FROM tb_roles WHERE rol = :rol");
$consulta->bindParam(':rol', $rol);
$consulta->execute();
$rol_existente = $consulta->fetchColumn();

if ($rol_existente > 0) {
    // Si el rol ya existe, redirigir con un mensaje de error
    session_start();
    $_SESSION['mensaje'] = "El nombre del rol ya existe. Intente con otro nombre.";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/roles/create.php');
} else {
    // Si el rol no existe, proceder con la inserción
    $sentencia = $pdo->prepare("INSERT INTO tb_roles (rol, fyh_creacion) VALUES (:rol, :fyh_creacion)");
    $sentencia->bindParam(':rol', $rol);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se registró el rol de la manera correcta.";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/roles/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos.";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/roles/create.php');
    }
}
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
