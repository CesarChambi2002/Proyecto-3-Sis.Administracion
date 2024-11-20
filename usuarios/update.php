<?php
include ('../app/config.php');
include ('../layout/sesion.php');

include ('../layout/parte1.php');

include ('../app/controllers/usuarios/update_usuario.php');
include ('../app/controllers/roles/listado_de_roles.php');
<<<<<<< HEAD


?>


=======
?>

>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1 class="m-0">Actualizar usuario</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

<<<<<<< HEAD

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

=======
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos con cuidado</h3>
                            <div class="card-tools">
<<<<<<< HEAD
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                            </div>

=======
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                            </div>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                        </div>

                        <div class="card-body" style="display: block;">
                            <div class="row">
                                <div class="col-md-12">
<<<<<<< HEAD

                                    <form action="../app/controllers/usuarios/update.php" method="post">
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" value="<?php echo $nombres;?>" placeholder="Escriba aquí el nombre del nuevo usuario..." required>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?php echo $email;?>" placeholder="Escriba aquí el correo del nuevo usuario..." required>
=======
                                    <form action="../app/controllers/usuarios/update.php" method="post" onsubmit="return validarFormulario()">
                                        <input type="text" name="id_usuario" value="<?php echo $id_usuario_get; ?>" hidden>
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" placeholder="Escriba aquí el nombre del nuevo usuario..." required>
                                            <small id="nombresError" style="color: red; display: none;">El nombre solo debe contener letras.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" value="<?php echo $email;?>" placeholder="Escriba aquí el correo del nuevo usuario..." required>
                                            <small id="emailError" style="color: red; display: none;">El correo debe terminar en .com</small>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                        </div>
                                        <div class="form-group">
                                            <label for="">Rol del usuario</label>
                                            <select name="rol" id="" class="form-control">
                                                <?php
                                                foreach ($roles_datos as $roles_dato){
                                                    $rol_tabla = $roles_dato['rol'];
                                                    $id_rol = $roles_dato['id_rol'];?>
                                                    <option value="<?php echo $id_rol; ?>"<?php if($rol_tabla == $rol){ ?> selected="selected" <?php } ?> >
                                                        <?php echo $rol_tabla;?>
                                                    </option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Contraseña</label>
<<<<<<< HEAD
                                            <input type="text" name="password_user" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Repita la Contraseña</label>
                                            <input type="text" name="password_repeat" class="form-control">
=======
                                            <input type="password" name="password_user" id="password_user" class="form-control">
                                            <small id="passwordError" style="color: red; display: none;">La contraseña debe tener al menos 8 caracteres y un carácter especial.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Repita la Contraseña</label>
                                            <input type="password" name="password_repeat" class="form-control">
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                                        </div>
                                        <hr>
                                        <div class="form-group">
                                            <a href="index.php" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                        </div>
                                    </form>
<<<<<<< HEAD

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

=======
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include ('../layout/mensajes.php'); ?>
<?php include ('../layout/parte2.php'); ?>
<<<<<<< HEAD
=======

<script>
function validarFormulario() {
    const email = document.getElementById('email').value;
    const emailError = document.getElementById('emailError');
    const password = document.getElementById('password_user').value;
    const passwordError = document.getElementById('passwordError');
    const nombres = document.getElementsByName('nombres')[0].value;
    const nombresError = document.getElementById('nombresError');

    let valid = true;

    // Validación de nombres (solo letras)
    const nombresRegex = /^[a-zA-Z\s]+$/;
    if (!nombresRegex.test(nombres)) {
        nombresError.style.display = 'block';
        valid = false;
    } else {
        nombresError.style.display = 'none';
    }

    // Validación de email
    if (!email.endsWith('.com')) {
        emailError.style.display = 'block';
        valid = false;
    } else {
        emailError.style.display = 'none';
    }

    // Validación de contraseña (mínimo 8 caracteres y un carácter especial)
    if (password) { // Solo si se ingresa una nueva contraseña
        const passwordRegex = /^(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/;
        if (!passwordRegex.test(password)) {
            passwordError.style.display = 'block';
            valid = false;
        } else {
            passwordError.style.display = 'none';
        }
    }

    return valid;
}
</script>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
