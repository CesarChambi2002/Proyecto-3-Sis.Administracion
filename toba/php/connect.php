<?php
header('Content-Type: application/json');

// Configuración de la conexión a la base de datos
define('SERVIDOR', 'localhost');
define('USUARIO', 'root');
define('PASSWORD', '');
define('BD', 'sistemadeventas');

$conexion = new mysqli(SERVIDOR, USUARIO, PASSWORD, BD);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Verificar si se solicita la lista de categorías
if (isset($_GET['categorias']) && $_GET['categorias'] === 'true') {
    $sql = "SELECT id_categoria, nombre_categoria FROM tb_categorias";
    $result = $conexion->query($sql);

    $categorias = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categorias[] = $row;
        }
    }

    echo json_encode($categorias);
    $conexion->close();
    exit();
}

// Consulta para obtener productos con filtro de nombre y categoría
$filtroNombre = isset($_GET['nombre']) ? $conexion->real_escape_string($_GET['nombre']) : '';
$filtroCategoria = isset($_GET['categoria']) ? $conexion->real_escape_string($_GET['categoria']) : '';

$sql = "SELECT nombre, descripcion, precio_venta, imagen, stock FROM tb_almacen WHERE 1";

// Añadir filtro de nombre si está presente
if (!empty($filtroNombre)) {
    $sql .= " AND nombre LIKE '%$filtroNombre%'";
}

// Añadir filtro de categoría si está presente
if (!empty($filtroCategoria)) {
    $sql .= " AND id_categoria = '$filtroCategoria'";
}

$result = $conexion->query($sql);

$productos = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $productos[] = $row;
    }
}

// Enviar los productos en formato JSON
echo json_encode($productos);
$conexion->close();
?>
