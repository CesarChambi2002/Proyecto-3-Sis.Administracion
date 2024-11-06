<?php
include ('../../config.php');

$nombre_categoria = $_GET['nombre_categoria'];
$fechaHora = date("Y-m-d H:i:s");

// Iniciar la sesión si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificación de duplicado por nombre de categoría
$checkQuery = $pdo->prepare("SELECT COUNT(*) FROM tb_categorias WHERE nombre_categoria = :nombre_categoria");
$checkQuery->bindParam(':nombre_categoria', $nombre_categoria);
$checkQuery->execute();
$exists = $checkQuery->fetchColumn();

if ($exists > 0) {
    $_SESSION['mensaje'] = "La categoría ya está registrada en el sistema.";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
    exit();
}

// Preparación y ejecución de la inserción si no existe duplicado
$sentencia = $pdo->prepare("INSERT INTO tb_categorias
    (nombre_categoria, fyh_creacion) 
VALUES (:nombre_categoria, :fyh_creacion)");

$sentencia->bindParam(':nombre_categoria', $nombre_categoria);
$sentencia->bindParam(':fyh_creacion', $fechaHora);

if ($sentencia->execute()) {
    $_SESSION['mensaje'] = "Se registró la categoría correctamente.";
    $_SESSION['icono'] = "success";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
} else {
    $_SESSION['mensaje'] = "Error: no se pudo registrar en la base de datos.";
    $_SESSION['icono'] = "error";
    ?>
    <script>
        location.href = "<?php echo $URL;?>/categorias";
    </script>
    <?php
}
