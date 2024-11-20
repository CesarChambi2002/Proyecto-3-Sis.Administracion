<?php
include ('../app/config.php');
include ('../layout/sesion.php');
<<<<<<< HEAD

include ('../layout/parte1.php');


include ('../app/controllers/compras/listado_de_compras.php');


=======
include ('../layout/parte1.php');
include ('../app/controllers/compras/listado_de_compras.php');
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<<<<<<< HEAD
    <!-- Content Header (Page header) -->
=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de compras actualizado</h1>
<<<<<<< HEAD
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

=======
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
<<<<<<< HEAD
                            <h3 class="card-title">Compras registrados</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="table table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th><center>Nro</center></th>
                                        <th><center>Nro de la compra</center></th>
                                        <th><center>Producto</center></th>
                                        <th><center>Fecha de compra</center></th>
                                        <th><center>Proveedor</center></th>
                                        <th><center>Comprobante</center></th>
                                        <th><center>Usuario</center></th>
                                        <th><center>Precio compra</center></th>
                                        <th><center>Cantidad</center></th>
                                        <th><center>Acciones</center></th>
=======
                            <h3 class="card-title">Compras registradas</h3>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                    <tr>
                                        <th>Nro</th>
                                        <th>Nro de la compra</th>
                                        <th>Producto</th>
                                        <th style="display:none;">Nombre del Producto</th>
                                        <th>Fecha de compra</th>
                                        <th>Proveedor</th>
                                        <th style="display:none;">Nombre del Proveedor</th>
                                        <th>Comprobante</th>
                                        <th>Usuario</th>
                                        <th>Precio compra</th>
                                        <th>Cantidad</th>
                                        <th>Acciones</th>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $contador = 0;
<<<<<<< HEAD
                                    foreach ($compras_datos as $compras_dato){
                                        $id_compra = $compras_dato['id_compra']; ?>
                                        <tr>
                                            <td><?php echo $contador = $contador + 1;?></td>
                                            <td><?php echo $compras_dato['nro_compra'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-producto<?php echo $id_compra;?>">
                                                    <?php echo $compras_dato['nombre_producto'];?>
                                                </button>
                                                <!-- modal para visualizar datos de los productos -->
                                                <div class="modal fade" id="modal-producto<?php echo $id_compra;?>">
=======
                                    foreach ($compras_datos as $compras_dato) {
                                        $id_compra = $compras_dato['id_compra']; ?>
                                        <tr>
                                            <td><?php echo ++$contador; ?></td>
                                            <td><?php echo $compras_dato['nro_compra']; ?></td>

                                            <!-- Columna con el botón y modal de producto -->
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-producto<?php echo $id_compra; ?>">
                                                    <?php echo $compras_dato['nombre_producto']; ?>
                                                </button>

                                                <!-- Modal para visualizar datos del producto -->
                                                <div class="modal fade" id="modal-producto<?php echo $id_compra; ?>">
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                                <h4 class="modal-title">Datos del producto</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
<<<<<<< HEAD

                                                                <div class="row">
                                                                    <div class="col-md-9">
                                                                        <div class="row">
                                                                            <div class="col-md-2">
                                                                                <div class="form-group">
                                                                                    <label for="">Código</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['codigo'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4">
                                                                                <div class="form-group">
                                                                                    <label for="">Nombre del producto</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['nombre'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <div class="form-group">
                                                                                    <label for="">Descripción del producto</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['descripcion'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Stock</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['stock'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Stock mínimo</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['stock_minimo'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Stock máximo</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['stock_maximo'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Fecha de Ingreso</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['fecha_ingreso'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>

                                                                        <div class="row">
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Precio Compra</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['precio_compra_producto'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Precio Venta</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['precio_venta_producto'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Categoría</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['nombre_categoria'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3">
                                                                                <div class="form-group">
                                                                                    <label for="">Usuario</label>
                                                                                    <input type="text" value="<?php echo $compras_dato['nombre_usuarios_producto'];?>" class="form-control" disabled>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="">Imagen del producto</label>
                                                                            <img src="<?php echo $URL."/almacen/img_productos/".$compras_dato['imagen'];?>" width="100%" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>





                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->
                                            </td>
                                            <td><?php echo $compras_dato['fecha_compra'];?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-proveedor<?php echo $id_compra;?>">
                                                    <?php echo $compras_dato['nombre_proveedor'];?>
                                                </button>

                                                <!-- modal para visualizar datos de los proveedor -->
                                                <div class="modal fade" id="modal-proveedor<?php echo $id_compra;?>">
=======
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Código</label>
                                                                            <input type="text" value="<?php echo $compras_dato['codigo']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Nombre del producto</label>
                                                                            <input type="text" value="<?php echo $compras_dato['nombre_producto']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Descripción del producto</label>
                                                                            <input type="text" value="<?php echo $compras_dato['descripcion']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Precio Compra</label>
                                                                            <input type="text" value="<?php echo $compras_dato['precio_compra_producto']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Precio Venta</label>
                                                                            <input type="text" value="<?php echo $compras_dato['precio_venta_producto']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Stock</label>
                                                                            <input type="text" value="<?php echo $compras_dato['stock']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Stock mínimo</label>
                                                                            <input type="text" value="<?php echo $compras_dato['stock_minimo']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Stock máximo</label>
                                                                            <input type="text" value="<?php echo $compras_dato['stock_maximo']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Fecha de Ingreso</label>
                                                                            <input type="text" value="<?php echo $compras_dato['fecha_ingreso']; ?>" class="form-control" disabled>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label>Imagen del producto</label>
                                                                            <img src="<?php echo $URL . "/almacen/img_productos/" . $compras_dato['imagen']; ?>" width="100%" alt="">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td style="display:none;"><?php echo $compras_dato['nombre_producto']; ?></td>

                                            <td><?php echo $compras_dato['fecha_compra']; ?></td>

                                            <!-- Columna con el botón y modal de proveedor -->
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                        data-target="#modal-proveedor<?php echo $id_compra; ?>">
                                                    <?php echo $compras_dato['nombre_proveedor']; ?>
                                                </button>

                                                <!-- Modal para visualizar datos del proveedor -->
                                                <div class="modal fade" id="modal-proveedor<?php echo $id_compra; ?>">
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header" style="background-color: #07b0d6;color: white">
                                                                <h4 class="modal-title">Datos del proveedor</h4>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
<<<<<<< HEAD
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre del proveedor</label>
                                                                            <input type="text" value="<?php echo $compras_dato['nombre_proveedor'];?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Celular del proveedor</label>
                                                                            <a href="https://wa.me/591<?php echo $compras_dato['celular_proveedor'];?>" target="_blank" class="btn btn-success">
                                                                                <i class="fa fa-phone"></i>
                                                                                <?php echo $compras_dato['celular_proveedor'];?>
                                                                            </a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Teléfono del proveedor</label>
                                                                            <input type="text" value="<?php echo $compras_dato['telefono_proveedor'];?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Empresa</label>
                                                                            <input type="text" value="<?php echo $compras_dato['empresa'];?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Email del proveedor</label>
                                                                            <input type="text" value="<?php echo $compras_dato['email_proveedor'];?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="">Dirección</label>
                                                                            <input type="text" value="<?php echo $compras_dato['direccion_proveedor'];?>" class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                    <!-- /.modal-dialog -->
                                                </div>
                                                <!-- /.modal -->

                                            </td>
                                            <td><?php echo $compras_dato['comprobante'];?></td>
                                            <td><?php echo $compras_dato['nombres_usuario'];?></td>
                                            <td><?php echo $compras_dato['precio_compra'];?></td>
                                            <td><?php echo $compras_dato['cantidad'];?></td>
                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="update.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="delete.php?id=<?php echo $id_compra; ?>" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</a>
=======
                                                                <div class="form-group">
                                                                    <label>Nombre del proveedor</label>
                                                                    <input type="text" value="<?php echo $compras_dato['nombre_proveedor']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Celular del proveedor</label>
                                                                    <input type="text" value="<?php echo $compras_dato['celular_proveedor']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Teléfono del proveedor</label>
                                                                    <input type="text" value="<?php echo $compras_dato['telefono_proveedor']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Empresa</label>
                                                                    <input type="text" value="<?php echo $compras_dato['empresa']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Email del proveedor</label>
                                                                    <input type="text" value="<?php echo $compras_dato['email_proveedor']; ?>" class="form-control" disabled>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <input type="text" value="<?php echo $compras_dato['direccion_proveedor']; ?>" class="form-control" disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td style="display:none;"><?php echo $compras_dato['nombre_proveedor']; ?></td>

                                            <td><?php echo $compras_dato['comprobante']; ?></td>
                                            <td><?php echo $compras_dato['nombres_usuario']; ?></td>
                                            <td><?php echo $compras_dato['precio_compra']; ?></td>
                                            <td><?php echo $compras_dato['cantidad']; ?></td>

                                            <td>
                                                <center>
                                                    <div class="btn-group">
                                                        <a href="show.php?id=<?php echo $id_compra; ?>" class="btn btn-info btn-sm"><i class="fa fa-eye"></i> Ver</a>
                                                        <a href="update.php?id=<?php echo $id_compra; ?>" class="btn btn-success btn-sm"><i class="fa fa-pencil-alt"></i> Editar</a>
                                                        <a href="delete.php?id=<?php echo $id_compra; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Borrar</a>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                                    </div>
                                                </center>
                                            </td>
                                        </tr>
<<<<<<< HEAD
                                        <?php
                                    }
                                    ?>
                                    </tbody>
                                    </tfoot>
=======
                                    <?php } ?>
                                    </tbody>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
<<<<<<< HEAD

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

=======
        </div>
    </div>
</div>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>

<<<<<<< HEAD

=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Compras",
                "infoEmpty": "Mostrando 0 a 0 de 0 Compras",
                "infoFiltered": "(Filtrado de _MAX_ total Compras)",
<<<<<<< HEAD
                "infoPostFix": "",
                "thousands": ",",
=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                "lengthMenu": "Mostrar _MENU_ Compras",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
<<<<<<< HEAD
            "responsive": true, "lengthChange": true, "autoWidth": false,
=======
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
<<<<<<< HEAD
                }, {
                    extend: 'pdf'
                },{
                    extend: 'csv'
                },{
                    extend: 'excel'
                },{
                    text: 'Imprimir',
                    extend: 'print'
                }
                ]
            },
                {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed three-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

</script>
=======
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6, 7, 8, 9, 10]
                    }
                }, {
                    extend: 'pdf',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6, 7, 8, 9, 10]
                    }
                },  {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6, 7, 8, 9, 10]
                    }
                }, {
                    text: 'Imprimir',
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 3, 4, 6, 7, 8, 9, 10]
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
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
