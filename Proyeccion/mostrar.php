<?php
include ('../app/config.php');
include ('../layout/sesion.php');
include ('../layout/parte1.php');
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Historial de Proyecciones de Ventas</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h3 class="card-title">Proyecciones Generadas Recientemente</h3>
                        </div>
                        <div class="card-body">
                            <?php
                            if (isset($_SESSION['resultados_proyeccion'])) {
                                echo '<table class="table table-bordered table-striped">';
                                echo '<thead><tr><th>Mes</th><th>Ventas Proyectadas</th></tr></thead><tbody>';
                                foreach ($_SESSION['resultados_proyeccion'] as $mes => $proyeccion) {
                                    echo "<tr><td>$mes</td><td>$proyeccion</td></tr>";
                                }
                                echo '</tbody></table>';
                            } else {
                                echo '<p>No hay proyecciones recientes.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('../layout/parte2.php'); ?>
