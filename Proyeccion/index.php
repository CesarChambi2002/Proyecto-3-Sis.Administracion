<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');

// Si la sesión tiene resultados de la proyección, los mostramos
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Proyección de Ventas</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Proyección de Ventas - Análisis Lineal</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <p>Utiliza este módulo para predecir las ventas futuras basadas en los datos históricos.</p>
                            <form action="Proyeccion/calcular.php" method="POST">
                                <div class="form-group">
                                    <label for="meses">Número de meses a proyectar:</label>
                                    <input type="number" class="form-control" id="meses" name="meses" required min="1">
                                </div>
                                <button type="submit" class="btn btn-primary">Generar Proyección</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Resultados de la Proyección -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Resultados de la Proyección</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['resultados_proyeccion'])) {
                                echo '<table class="table table-bordered table-striped">';
                                echo '<thead><tr><th>Mes</th><th>Ventas Proyectadas</th></tr></thead><tbody>';
                                foreach ($_SESSION['resultados_proyeccion'] as $mes => $proyeccion) {
                                    // Formateamos las ventas proyectadas para mostrar comas en números grandes
                                    echo "<tr><td>$mes</td><td>" . number_format($proyeccion, 2) . "</td></tr>";
                                }
                                echo '</tbody></table>';
                                unset($_SESSION['resultados_proyeccion']); // Limpiar resultados después de mostrar
                            } else {
                                echo '<p>No hay proyecciones recientes. Ingrese un número de meses y genere una proyección.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
