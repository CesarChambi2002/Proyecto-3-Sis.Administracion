<?php
include ('../../config.php');

$nro_venta = $_GET['nro_venta'];
$id_cliente = $_GET['id_cliente'];
$total_a_cancelar = $_GET['total_a_cancelar'];

// Consulta los productos en el carrito
$sql_carrito = "SELECT carr.id_producto, carr.cantidad, pro.stock 
                FROM tb_carrito AS carr
                INNER JOIN tb_almacen AS pro 
                ON carr.id_producto = pro.id_producto 
                WHERE carr.nro_venta = :nro_venta";

$query_carrito = $pdo->prepare($sql_carrito);
$query_carrito->bindParam(':nro_venta', $nro_venta, PDO::PARAM_INT);
$query_carrito->execute();
$productos_carrito = $query_carrito->fetchAll(PDO::FETCH_ASSOC);

// Validación de stock
foreach ($productos_carrito as $producto) {
    if ($producto['cantidad'] > $producto['stock']) {
        session_start();
        $_SESSION['mensaje'] = "Error: Producto con ID {$producto['id_producto']} tiene stock insuficiente.";
        $_SESSION['icono'] = "error";
        ?>
        <script>
            alert("Error: Producto con stock insuficiente.");
            location.href = "<?php echo $URL; ?>/ventas/create.php";
        </script>
        <?php
        exit(); // Detener la ejecución si no hay suficiente stock
    }
}

$pdo->beginTransaction();

$sentencia = $pdo->prepare("INSERT INTO tb_ventas
       (nro_venta, id_cliente, total_pagado, fyh_creacion) 
VALUES (:nro_venta, :id_cliente, :total_pagado, :fyh_creacion)");

$sentencia->bindParam('nro_venta', $nro_venta);
$sentencia->bindParam('id_cliente', $id_cliente);
$sentencia->bindParam('total_pagado', $total_a_cancelar);

$fechaHora = date('Y-m-d H:i:s');
$sentencia->bindParam('fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    // Actualizamos el stock después de validar
    foreach ($productos_carrito as $producto) {
        $nuevo_stock = $producto['stock'] - $producto['cantidad'];
        $update_stock = $pdo->prepare("UPDATE tb_almacen 
                                       SET stock = :nuevo_stock 
                                       WHERE id_producto = :id_producto");
        $update_stock->bindParam(':nuevo_stock', $nuevo_stock, PDO::PARAM_INT);
        $update_stock->bindParam(':id_producto', $producto['id_producto'], PDO::PARAM_INT);
        $update_stock->execute();
    }

    $pdo->commit();

    session_start();
    $_SESSION['mensaje'] = "Venta registrada correctamente.";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas";
    </script>
    <?php
} else {
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error: No se pudo registrar la venta.";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL; ?>/ventas/create.php";
    </script>
    <?php
}






