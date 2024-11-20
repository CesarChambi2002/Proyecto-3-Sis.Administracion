<?php

include ('../../config.php');

$id_carrito = $_POST['id_carrito'];

// Primero, verificar si hay dependencias en tb_ventas
$query_dependencias = $pdo->prepare("SELECT COUNT(*) FROM tb_ventas WHERE nro_venta IN (SELECT nro_venta FROM tb_carrito WHERE id_carrito = :id_carrito)");
$query_dependencias->bindParam('id_carrito', $id_carrito);
$query_dependencias->execute();
$dependencias = $query_dependencias->fetchColumn();

if ($dependencias > 0) {
    // Si hay dependencias, no ejecutar el borrado y mostrar un mensaje
    ?>
    <script>
        alert("No se puede eliminar este carrito porque tiene ventas asociadas.");
        location.href = "<?php echo $URL;?>/ventas/create.php";
    </script>
    <?php
} else {
    // Si no hay dependencias, ejecutar el borrado
    $sentencia = $pdo->prepare("DELETE FROM tb_carrito WHERE id_carrito=:id_carrito");
    $sentencia->bindParam('id_carrito', $id_carrito);

    if ($sentencia->execute()) {
        ?>
        <script>
            location.href = "<?php echo $URL;?>/ventas/create.php";
        </script>
        <?php
    } else {
        ?>
        <script>
            alert("Ocurrió un error al eliminar el carrito.");
            location.href = "<?php echo $URL;?>/ventas/create.php";
        </script>
        <?php
    }
}
?>
