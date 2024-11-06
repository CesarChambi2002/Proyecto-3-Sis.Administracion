<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');


include ('../app/controllers/categorias/listado_de_categoria.php');


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Listado de Categorías
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-create">
                           <i class="fa fa-plus"></i> Agregar Nuevo
                        </button>
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-md-6">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Categorías registrados</h3>
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
                                    <th><center>Nombre de la categoría</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador = 0;
                                foreach ($categorias_datos as $categorias_dato){
                                    $id_categoria = $categorias_dato['id_categoria'];
                                    $nombre_categoria = $categorias_dato['nombre_categoria']; ?>
                                    <tr>
                                        <td><center><?php echo $contador = $contador + 1;?></center></td>
                                        <td><?php echo $categorias_dato['nombre_categoria'];?></td>
                                        <td>
                                            <center>
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                                            data-target="#modal-update<?php echo $id_categoria;?>">
                                                        <i class="fa fa-pencil-alt"></i> Editar
                                                    </button>
                                                    <!-- modal para actualizar categorias -->
                                                    <div class="modal fade" id="modal-update<?php echo $id_categoria;?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header" style="background-color: #116f4a;color: white">
                                                                    <h4 class="modal-title">Actualización de la categoría</h4>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <label for="">Nombre de la categoría</label>
                                                                            <input type="text" id="nombre_categoria<?php echo $id_categoria;?>" value="<?php echo $nombre_categoria; ?>" class="form-control" maxlength="20">
                                                                            <small style="color: red;display: none" id="lbl_update<?php echo $id_categoria;?>">* Este campo es requerido</small>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                                                    <button type="button" class="btn btn-success" id="btn_update<?php echo $id_categoria;?>">Actualizar</button>
                                                                </div>
                                                            </div>                                             
                                                        </div>
                                                    </div>
                                                    <script>
                                                        // Restringir el campo para que solo permita letras y espacios
                                                        $('#nombre_categoria<?php echo $id_categoria;?>').on('input', function () {
                                                            // Remover caracteres que no sean letras o espacios
                                                            this.value = this.value.replace(/[^A-Za-z\s]/g, '');
                                                        });

                                                        $('#btn_update<?php echo $id_categoria;?>').click(function () {
                                                            var nombre_categoria = $('#nombre_categoria<?php echo $id_categoria;?>').val();
                                                            var id_categoria = '<?php echo $id_categoria;?>';
                                                    
                                                            if (nombre_categoria == "") {
                                                                $('#nombre_categoria<?php echo $id_categoria;?>').focus();
                                                                $('#lbl_update<?php echo $id_categoria;?>').css('display', 'block');
                                                            } else {
                                                                var url = "../app/controllers/categorias/update_de_categorias.php";
                                                                $.get(url, { nombre_categoria: nombre_categoria, id_categoria: id_categoria }, function (datos) {
                                                                    $('#respuesta_update<?php echo $id_categoria;?>').html(datos);
                                                                });
                                                            }
                                                        });
                                                    </script>

                                                    <div id="respuesta_update<?php echo $id_categoria;?>"></div>
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
                                    <th><center>Nombre de la categoría</center></th>
                                    <th><center>Acciones</center></th>
                                </tr>
                                </tfoot>
                            </table>
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
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Categorías",
                "infoEmpty": "Mostrando 0 a 0 de 0 Categorías",
                "infoFiltered": "(Filtrado de _MAX_ total Categorías)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Categorías",
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
            "responsive": true, 
            "lengthChange": true, 
            "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [
                    {
                        text: 'Copiar',
                        extend: 'copy',
                        exportOptions: {
                            columns: [0, 1]  // Selecciona solo las columnas Nro y Nombre de la categoría
                        }
                    },
                    {
                        extend: 'pdf',
                        title: 'Listado de Categorías',
                        alignment: 'center',
                        exportOptions: {
                            columns: [0, 1]  // Selecciona solo las columnas Nro y Nombre de la categoría
                        },
                        customize: function (doc) {
                            doc.styles.title = {
                                alignment: 'center',
                                fontSize: 16,
                                bold: true
                            };
                            doc.content[1].table.widths = ['20%', '80%'];  // Ajusta el ancho de las columnas en el PDF
                            doc.content[1].margin = [50, 0, 50, 0];  // Centra la tabla horizontalmente
                        }
                    },
                    {
                        extend: 'excel',
                        title: 'Listado de Categorías',
                        exportOptions: {
                            columns: [0, 1]  // Selecciona solo las columnas Nro y Nombre de la categoría
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
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

        // Restringir la entrada en el campo de búsqueda (si existe)
        $('#example1_filter input').on('input', function () {
            // Remover caracteres que no sean letras, números o espacios
            this.value = this.value.replace(/[^\w\s]/g, '');
        });
    });
</script>







<!-- modal para registrar categorias -->
<div class="modal fade" id="modal-create">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #1d36b6;color: white">
                <h4 class="modal-title">Creación de una nueva categoría</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                    <div class="form-group">
                            <label for="">Nombre de la categoría <b>*</b></label>
                            <input type="text" id="nombre_categoria" class="form-control" maxlength="20">
                            <small style="color: red;display: none" id="lbl_create">* Este campo es requerido</small>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="btn_create">Guardar categoría</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
    // Restringir el campo para que solo permita letras y espacios
    $('#nombre_categoria').on('input', function () {
        // Remover caracteres que no sean letras o espacios
        this.value = this.value.replace(/[^A-Za-z\s]/g, '');
    });

    $('#btn_create').click(function () {
        var nombre_categoria = $('#nombre_categoria').val();

        if (nombre_categoria == "") {
            $('#nombre_categoria').focus();
            $('#lbl_create').css('display', 'block');
        } else {
            var url = "../app/controllers/categorias/registro_de_categorias.php";
            $.get(url, { nombre_categoria: nombre_categoria }, function (datos) {
                $('#respuesta').html(datos);
            });
        }
    });
</script>



<div id="respuesta"></div>








