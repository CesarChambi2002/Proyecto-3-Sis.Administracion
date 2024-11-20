<?php

<<<<<<< HEAD

=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
include ('../../config.php');

$id_producto = $_POST['id_producto'];

<<<<<<< HEAD
$sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto=:id_producto ");

$sentencia->bindParam('id_producto',$id_producto);
if($sentencia->execute()){
    session_start();
    $_SESSION['mensaje'] = "Se elimino el producto de la manera correcta";
    $_SESSION['icono'] = "success";
    header('Location: '.$URL.'/almacen/');
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar el registro en la base de datos";
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/delete.php?id='.$id_producto);
}
=======
try {
    // Desactivar la revisión de claves foráneas temporalmente
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0");

    $sentencia = $pdo->prepare("DELETE FROM tb_almacen WHERE id_producto=:id_producto ");
    $sentencia->bindParam('id_producto', $id_producto);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se eliminó el producto de la manera correcta";
        $_SESSION['icono'] = "success";
        header('Location: '.$URL.'/almacen/');
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo eliminar el registro en la base de datos";
        $_SESSION['icono'] = "error";
        header('Location: '.$URL.'/almacen/delete.php?id='.$id_producto);
    }

} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    header('Location: '.$URL.'/almacen/delete.php?id='.$id_producto);
} finally {
    // Reactivar la revisión de claves foráneas
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1");
}

?>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
