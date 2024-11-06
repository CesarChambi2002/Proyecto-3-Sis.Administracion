<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');
include ('../app/controllers/almacen/listado_de_productos.php');
include ('../app/controllers/categorias/listado_de_categoria.php');

// Iniciar la sesión si aún no está activa
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Recuperar datos del formulario desde la sesión si existen
$form_data = isset($_SESSION['form_data']) ? $_SESSION['form_data'] : [];
unset($_SESSION['form_data']); // Limpiar datos después de cargarlos

// Variables para cada campo con valores predefinidos
$codigo = isset($form_data['codigo']) ? $form_data['codigo'] : '';
$id_categoria = isset($form_data['id_categoria']) ? $form_data['id_categoria'] : '';
$nombre = isset($form_data['nombre']) ? $form_data['nombre'] : '';
$descripcion = isset($form_data['descripcion']) ? $form_data['descripcion'] : '';
$stock = isset($form_data['stock']) ? $form_data['stock'] : '';
$stock_minimo = isset($form_data['stock_minimo']) ? $form_data['stock_minimo'] : '';
$stock_maximo = isset($form_data['stock_maximo']) ? $form_data['stock_maximo'] : '';
$precio_compra = isset($form_data['precio_compra']) ? $form_data['precio_compra'] : '';
$precio_venta = isset($form_data['precio_venta']) ? $form_data['precio_venta'] : '';
$fecha_ingreso = isset($form_data['fecha_ingreso']) ? $form_data['fecha_ingreso'] : date("Y-m-d");
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Registro de un nuevo producto</h1>
                </div>
            </div>
        </div>
    </div>
    <div class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos con cuidado</h3>
                </div>

                <div class="card-body">
                    <form action="../app/controllers/almacen/create.php" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Código:</label>
                                    <input type="text" class="form-control" value="<?php echo htmlspecialchars($codigo); ?>" disabled>
                                    <input type="text" name="codigo" value="<?php echo htmlspecialchars($codigo); ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Categoría:</label>
                                    <select name="id_categoria" class="form-control" required>
                                        <?php foreach ($categorias_datos as $categorias_dato) { ?>
                                            <option value="<?php echo $categorias_dato['id_categoria']; ?>"
                                                <?php echo $id_categoria == $categorias_dato['id_categoria'] ? 'selected' : ''; ?>>
                                                <?php echo $categorias_dato['nombre_categoria']; ?>
                                            </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Nombre del producto:</label>
                                    <input type="text" name="nombre" class="form-control" value="<?php echo htmlspecialchars($nombre); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="">Usuario</label>
                                    <input type="text" class="form-control" value="<?php echo $email_sesion; ?>" disabled>
                                    <input type="text" name="id_usuario" value="<?php echo $id_usuario_sesion; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="">Descripción del producto:</label>
                                    <textarea name="descripcion" class="form-control"><?php echo htmlspecialchars($descripcion); ?></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock:</label>
                                    <input type="number" name="stock" class="form-control" value="<?php echo htmlspecialchars($stock); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock mínimo:</label>
                                    <input type="number" name="stock_minimo" class="form-control" value="<?php echo htmlspecialchars($stock_minimo); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Stock máximo:</label>
                                    <input type="number" name="stock_maximo" class="form-control" value="<?php echo htmlspecialchars($stock_maximo); ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio compra:</label>
                                    <input type="number" name="precio_compra" class="form-control" value="<?php echo htmlspecialchars($precio_compra); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Precio venta:</label>
                                    <input type="number" name="precio_venta" class="form-control" value="<?php echo htmlspecialchars($precio_venta); ?>" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="">Fecha de ingreso:</label>
                                    <input type="date" name="fecha_ingreso" class="form-control" value="<?php echo htmlspecialchars($fecha_ingreso); ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Imagen del producto</label>
                            <input type="file" name="image" class="form-control" id="file">
                            <br>
                            <output id="list" style=""></output>
                            <script>
                                function archivo(evt) {
                                    var files = evt.target.files;
                                    for (var i = 0, f; f = files[i]; i++) {
                                        if (!f.type.match('image.*')) {
                                            continue;
                                        }
                                        var reader = new FileReader();
                                        reader.onload = (function (theFile) {
                                            return function (e) {
                                                document.getElementById("list").innerHTML = ['<img class="thumb thumbnail" src="', e.target.result, '" width="100%" title="', escape(theFile.name), '"/>'].join('');
                                            };
                                        })(f);
                                        reader.readAsDataURL(f);
                                    }
                                }
                                document.getElementById('file').addEventListener('change', archivo, false);
                            </script>
                        </div>
                        <hr>
                        <div class="form-group">
                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar producto</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    // Restringir entrada a solo números y punto decimal en los campos numéricos
    $('input[name="stock"], input[name="stock_minimo"], input[name="stock_maximo"], input[name="precio_compra"], input[name="precio_venta"]').on('input', function () {
        // Reemplaza cualquier carácter que no sea un número o un punto decimal
        $(this).val($(this).val().replace(/[^0-9.]/g, ''));
    });
</script>
<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
