<?php

include ('../../config.php');

$id_proveedor = $_GET['id_proveedor'];

<<<<<<< HEAD
$sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor ");

$sentencia->bindParam('id_proveedor',$id_proveedor);

if($sentencia->execute()){
    session_start();
    // echo "se registro correctamente";
    $_SESSION['mensaje'] = "Se elimino al proveedor de la manera correcta";
    $_SESSION['icono'] = "success";
    // header('Location: '.$URL.'/categorias/');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}else{
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo eliminar en la base de datos";
    $_SESSION['icono'] = "error";
    //  header('Location: '.$URL.'/categorias');
    ?>
    <script>
        location.href = "<?php echo $URL;?>/proveedores";
    </script>
    <?php
}
=======
try {
    // Desactivar la revisión de claves foráneas temporalmente
    $pdo->exec("SET FOREIGN_KEY_CHECKS=0");

    $sentencia = $pdo->prepare("DELETE FROM tb_proveedores WHERE id_proveedor=:id_proveedor");
    $sentencia->bindParam('id_proveedor', $id_proveedor);

    if ($sentencia->execute()) {
        session_start();
        $_SESSION['mensaje'] = "Se eliminó al proveedor de la manera correcta";
        $_SESSION['icono'] = "success";
        ?>
        <script>
            location.href = "<?php echo $URL; ?>/proveedores";
        </script>
        <?php
    } else {
        session_start();
        $_SESSION['mensaje'] = "Error: no se pudo eliminar en la base de datos";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            location.href = "<?php echo $URL; ?>/proveedores";
        </script>
        <?php
    }

} catch (PDOException $e) {
    session_start();
    $_SESSION['mensaje'] = "Error: " . $e->getMessage();
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/proveedores";
    </script>
    <?php
} finally {
    // Reactivar la revisión de claves foráneas
    $pdo->exec("SET FOREIGN_KEY_CHECKS=1");
}

?>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
