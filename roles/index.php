<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/roles/listado_de_roles.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de roles</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Roles registrado</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

                        </div>

                        <div class="card-body" style="display: block;">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del rol</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                foreach ($roles_datos as $roles_dato){
                                    $id_rol = $roles_dato['id_rol']; ?>
                                    <tr>
                                        <td><center><?php echo $contador = $contador + 1;?></center></td>
                                        <td><?php echo $roles_dato['rol'];?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <a href="update.php?id=<?php echo $id_rol; ?>" type="button" class="btn btn-success">
                                                        <i class="fa fa-pencil-alt"></i> Editar</a>
                                                </div>
                                            </center>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><center>Nro</center></th>
                                    <th><center>Nombre del rol</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>


<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Roles",
                "infoEmpty": "Mostrando 0 a 0 de 0 Roles",
                "infoFiltered": "(Filtrado de _MAX_ total Roles)",
<<<<<<< HEAD
                "infoPostFix": "",
                "thousands": ",",
=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                "lengthMenu": "Mostrar _MENU_ Roles",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
<<<<<<< HEAD
                    "last": "Ultimo",
=======
                    "last": "Último",
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
<<<<<<< HEAD
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
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
=======
            "responsive": true,
            "lengthChange": true,
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                buttons: [
                    {
                        text: 'Copiar',
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1] // Exportar solo las columnas Nro y Nombre del rol
                        }
                    },
                    {
                        extend: 'pdf',
                        orientation: 'portrait', // Orientación vertical
                        pageSize: 'A4',
                        customize: function (doc) {
                            // Centramos el contenido
                            doc.content[1].table.widths = ['*', '*'];
                            doc.content[1].table.alignment = 'center';
                            doc.styles.tableBodyEven.alignment = 'center';
                            doc.styles.tableBodyOdd.alignment = 'center';

                            // Centramos el título
                            doc.content[0].text = 'Listado de Roles';
                            doc.content[0].alignment = 'center';
                            doc.content[0].fontSize = 14;
                        },
                        exportOptions: {
                            columns: [0, 1] // Exportar solo las columnas Nro y Nombre del rol
                        }
                    },
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    },
                    {
                        text: 'Imprimir',
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1]
                        }
                    }
                ]
            },
            {
                extend: 'colvis',
                text: 'Visor de columnas',
                collectionLayout: 'fixed three-column'
            }],
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>

<<<<<<< HEAD
</script>
=======
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
