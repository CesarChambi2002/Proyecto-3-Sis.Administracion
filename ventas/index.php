<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');
include ('../app/controllers/ventas/listado_de_ventas.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de ventas realizadas</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Ventas registradas</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nro de venta</th>
                                        <th>Productos</th>
                                        <th style="display:none;">Nombre del Producto</th> <!-- Columna oculta para exportar solo el nombre del producto -->
                                        <th>Cliente</th>
                                        <th style="display:none;">Nombre del Cliente</th> <!-- Columna oculta para exportar solo el nombre del cliente -->
                                        <th>Total pagado</th>
                                        <th>Acciones</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
                                    foreach ($ventas_datos as $ventas_dato){
                                        $id_venta = $ventas_dato['id_venta'];
                                        $id_cliente = $ventas_dato['id_cliente'];
                                        $contador++;

                                        // Obtener todos los nombres de productos para la venta actual
                                        $nro_venta = $ventas_dato['nro_venta'];
                                        $sql_productos = "SELECT pro.nombre as nombre_producto FROM tb_carrito AS carr 
                                                          INNER JOIN tb_almacen AS pro ON carr.id_producto = pro.id_producto 
                                                          WHERE carr.nro_venta = '$nro_venta'";
                                        $query_productos = $pdo->prepare($sql_productos);
                                        $query_productos->execute();
                                        $productos_datos = $query_productos->fetchAll(PDO::FETCH_ASSOC);

                                        // Concatenar nombres de productos para la exportación
                                        $nombres_productos = array_column($productos_datos, 'nombre_producto');
                                        $nombre_producto_export = implode(', ', $nombres_productos);
                                        ?>
                                        <tr>
                                            <td><?php echo $contador; ?></td>
                                            <td><?php echo $ventas_dato['nro_venta']; ?></td>

                                            <!-- Columna con el botón y modal de producto -->
                                            <td>
                                                <center>
                                                    <!-- Botón que abre el modal de productos -->
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#Modal_productos<?php echo $id_venta; ?>">
                                                        <i class="fa fa-shopping-basket"></i> Productos
                                                    </button>

                                                    <!-- Modal para mostrar detalles de los productos de la venta -->
                                                    <div class="modal fade" id="Modal_productos<?php echo $id_venta; ?>" tabindex="-1" role="dialog">
                                                        <div class="modal-dialog modal-lg" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #08c2ec">
                                                                    <h5 class="modal-title">Productos de la venta nro <?php echo $ventas_dato['nro_venta']; ?></h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered table-sm table-hover table-striped">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style="text-align: center">Nro</th>
                                                                                    <th style="text-align: center">Producto</th>
                                                                                    <th style="text-align: center">Descripción</th>
                                                                                    <th style="text-align: center">Cantidad</th>
                                                                                    <th style="text-align: center">Precio Unitario</th>
                                                                                    <th style="text-align: center">Precio SubTotal</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php
                                                                            $contador_de_carrito = 0;
                                                                            $cantidad_total = 0;
                                                                            $precio_total = 0;

                                                                            $sql_carrito = "SELECT *, pro.nombre as nombre_producto FROM tb_carrito AS carr 
                                                                                            INNER JOIN tb_almacen AS pro ON carr.id_producto = pro.id_producto 
                                                                                            WHERE nro_venta = '$nro_venta' ORDER BY id_carrito ASC";
                                                                            $query_carrito = $pdo->prepare($sql_carrito);
                                                                            $query_carrito->execute();
                                                                            $carrito_datos = $query_carrito->fetchAll(PDO::FETCH_ASSOC);
                                                                            foreach ($carrito_datos as $carrito_dato){
                                                                                $contador_de_carrito++;
                                                                                $cantidad = floatval($carrito_dato['cantidad']);
                                                                                $precio_venta = floatval($carrito_dato['precio_venta']);
                                                                                $subtotal = $cantidad * $precio_venta;

                                                                                $cantidad_total += $cantidad;
                                                                                $precio_total += $subtotal;
                                                                                ?>
                                                                                <tr>
                                                                                    <td style="text-align: center"><?php echo $contador_de_carrito; ?></td>
                                                                                    <td><?php echo $carrito_dato['nombre_producto']; ?></td>
                                                                                    <td><?php echo $carrito_dato['descripcion']; ?></td>
                                                                                    <td style="text-align: center"><?php echo $carrito_dato['cantidad']; ?></td>
                                                                                    <td style="text-align: center"><?php echo $carrito_dato['precio_venta']; ?></td>
                                                                                    <td style="text-align: center"><?php echo $subtotal; ?></td>
                                                                                </tr>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <th colspan="3" style="text-align: right; background-color: #e7e7e7">Total</th>
                                                                                <th style="text-align: center; background-color: #e7e7e7"><?php echo $cantidad_total; ?></th>
                                                                                <th style="text-align: center; background-color: #fff819" colspan="2"><?php echo $precio_total; ?></th>
                                                                            </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </center>
                                            </td>

                                            <!-- Columna oculta solo con el nombre del producto para exportación -->
                                            <td style="display:none;"><?php echo $nombre_producto_export; ?></td>

                                            <!-- Columna con el botón y modal de cliente -->
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#Modal_clientes<?php echo $id_venta; ?>">
                                                    <?php echo $ventas_dato['nombre_cliente']; ?>
                                                </button>

                                                <!-- Modal para visualizar datos del cliente -->
                                                <div class="modal fade" id="Modal_clientes<?php echo $id_venta; ?>">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #b6900c;color: white">
                                                                <h4 class="modal-title">Cliente</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label>Nombre del cliente</label>
                                                                    <input type="text" value="<?php echo $ventas_dato['nombre_cliente']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>NIT/CI</label>
                                                                    <input type="text" value="<?php echo $ventas_dato['nit_ci_cliente']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Celular</label>
                                                                    <input type="text" value="<?php echo $ventas_dato['celular_cliente']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Correo electrónico</label>
                                                                    <input type="text" value="<?php echo $ventas_dato['email_cliente']; ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Columna oculta solo con el nombre del cliente -->
                                            <td style="display:none;"><?php echo $ventas_dato['nombre_cliente']; ?></td>

                                            <td><?php echo "Bs. " . $ventas_dato['total_pagado']; ?></td>

                                            <td>
                                                <a href="show.php?id_venta=<?php echo $id_venta; ?>" class="btn btn-info"><i class="fa fa-eye"></i> Ver</a>
                                                <a href="delete.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $ventas_dato['nro_venta']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Borrar</a>
                                                <a href="factura.php?id_venta=<?php echo $id_venta; ?>&nro_venta=<?php echo $ventas_dato['nro_venta']; ?>" class="btn btn-success"><i class="fa fa-print"></i> Imprimir</a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Ventas",
                "infoEmpty": "Mostrando 0 a 0 de 0 Ventas",
                "infoFiltered": "(Filtrado de _MAX_ total Ventas)",
                "lengthMenu": "Mostrar _MENU_ Ventas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 3, 5, 6] // Exportar solo Nro, Nombre del Producto, Nombre del Cliente, Total pagado
                    }
                }, {
                    extend: 'pdf',
                    orientation: 'portrait', // Orientación vertical
                    pageSize: 'A4',
                    customize: function (doc) {
                        // Centramos el contenido
                        doc.content[1].table.widths = ['*', '*', '*', '*'];
                        doc.content[1].table.alignment = 'center';
                        doc.styles.tableBodyEven.alignment = 'center';
                        doc.styles.tableBodyOdd.alignment = 'center';

                        // Centramos el título
                        doc.content[0].text = 'Reporte de Ventas';
                        doc.content[0].alignment = 'center';
                        doc.content[0].fontSize = 14;
                    },
                    exportOptions: {
                        columns: [0, 3, 5, 6] // Exportar solo Nro, Nombre del Producto, Nombre del Cliente, Total pagado
                    }
                },  {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 3, 5, 6]
                    }
                }, {
                    text: 'Imprimir',
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 3, 5, 6]
                    }
                }]
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
            }],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
