<?php
include ('../../config.php');

// Iniciar la sesión si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Obtener el último código de producto y calcular el nuevo
$query = $pdo->prepare("SELECT MAX(id_producto) AS max_id FROM tb_almacen");
$query->execute();
$result = $query->fetch(PDO::FETCH_ASSOC);
$ultimo_id = $result['max_id'] ?? 0;
$nuevo_codigo = "P-" . str_pad($ultimo_id + 1, 5, "0", STR_PAD_LEFT);

// Recibir datos del formulario
$id_categoria = $_POST['id_categoria'];
$nombre = $_POST['nombre'];
$id_usuario = $_POST['id_usuario'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$stock_minimo = $_POST['stock_minimo'];
$stock_maximo = $_POST['stock_maximo'];
$precio_compra = $_POST['precio_compra'];
$precio_venta = $_POST['precio_venta'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$image = $_FILES['image'];

// Guardar todos los datos ingresados en sesión para preservar si hay errores
$_SESSION['form_data'] = $_POST;

// Verificación de duplicado por nombre de producto
$checkQuery = $pdo->prepare("SELECT COUNT(*) FROM tb_almacen WHERE nombre = :nombre");
$checkQuery->bindParam(':nombre', $nombre);
$checkQuery->execute();
$exists = $checkQuery->fetchColumn();

if ($exists > 0) {
    $_SESSION['mensaje'] = "El producto ya está registrado en el sistema.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit();
}

// Validaciones adicionales
if ($stock <= 10) {
    $_SESSION['mensaje'] = "El stock debe ser mayor a 10.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit();
}

if ($stock_minimo >= $stock_maximo) {
    $_SESSION['mensaje'] = "El stock mínimo debe ser menor que el stock máximo.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit();
}

if ($precio_compra <= 0) {
    $_SESSION['mensaje'] = "El precio de compra debe ser mayor a 0.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit();
}

if ($precio_venta <= $precio_compra) {
    $_SESSION['mensaje'] = "El precio de venta debe ser mayor que el precio de compra.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
    exit();
}

// Procesamiento de la imagen
$nombreDelArchivo = date("Y-m-d-h-i-s");
$filename = $nombreDelArchivo . "__" . $image['name'];
$location = "../../../almacen/img_productos/" . $filename;

if (move_uploaded_file($image['tmp_name'], $location)) {
    // Preparación y ejecución de la sentencia SQL
    $sentencia = $pdo->prepare("INSERT INTO tb_almacen
        (codigo, nombre, descripcion, stock, stock_minimo, stock_maximo, precio_compra, precio_venta, fecha_ingreso, imagen, id_usuario, id_categoria, fyh_creacion) 
    VALUES (:codigo, :nombre, :descripcion, :stock, :stock_minimo, :stock_maximo, :precio_compra, :precio_venta, :fecha_ingreso, :imagen, :id_usuario, :id_categoria, :fyh_creacion)");

    $fechaHora = date("Y-m-d H:i:s");

    $sentencia->bindParam(':codigo', $nuevo_codigo);
    $sentencia->bindParam(':nombre', $nombre);
    $sentencia->bindParam(':descripcion', $descripcion);
    $sentencia->bindParam(':stock', $stock);
    $sentencia->bindParam(':stock_minimo', $stock_minimo);
    $sentencia->bindParam(':stock_maximo', $stock_maximo);
    $sentencia->bindParam(':precio_compra', $precio_compra);
    $sentencia->bindParam(':precio_venta', $precio_venta);
    $sentencia->bindParam(':fecha_ingreso', $fecha_ingreso);
    $sentencia->bindParam(':imagen', $filename);
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->bindParam(':id_categoria', $id_categoria);
    $sentencia->bindParam(':fyh_creacion', $fechaHora);

    if ($sentencia->execute()) {
        $_SESSION['mensaje'] = "Producto registrado exitosamente.";
        $_SESSION['icono'] = "success";
        unset($_SESSION['form_data']); // Limpiar los datos de formulario en la sesión
        header('Location: ' . $URL . '/almacen/');
    } else {
        $_SESSION['mensaje'] = "Error al registrar el producto en la base de datos.";
        $_SESSION['icono'] = "error";
        header('Location: ' . $URL . '/almacen/create.php');
    }
} else {
    $_SESSION['mensaje'] = "Error al subir la imagen del producto.";
    $_SESSION['icono'] = "error";
    header('Location: ' . $URL . '/almacen/create.php');
}
?>
