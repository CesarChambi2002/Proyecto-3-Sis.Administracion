<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de ventas</title>

    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
 
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/dist/css/adminlte.min.css">

    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    
    <script src="<?php echo $URL;?>/public/templeates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>

</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">

   
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="#" class="nav-link">SISTEMA DE VENTAS </a>
            </li>
        </ul>
    
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
     
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
       
        <a href="<?php echo $URL;?>" class="brand-link">
            <img src="<?php echo $URL;?>/public/images/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
<<<<<<< HEAD
            <span class="brand-text font-weight-light">CHICORITAS</span>
=======
            <span class="brand-text font-weight-light">TIENDA TOBA</span>
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
        </a>
      
        <div class="sidebar">
         
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                
                <div class="info">
                    <a href="#" class="d-block"><?php echo $nombres_sesion;?></a>
                </div>
            </div>
<<<<<<< HEAD

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">             
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Usuarios
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de usuarios</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/usuarios/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de usuario</p>
                                </a>
                            </li>
                        </ul>
                    </li>
=======
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false"> 
   <!-- USUARIOS   -->                               
        <li class="nav-item">
        <a href="#" class="nav-link active" style="background-color: orange; color: black;">
            <i class="nav-icon fas fa-users" style="color: black;"></i>
            <p>
                Usuarios
                <i class="right fas fa-angle-left" style="color: black;"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="<?php echo $URL;?>/usuarios" class="nav-link" style="background-color: #FFD700; color: black;">
                    <i class="far fa-circle nav-icon" style="color: black;"></i>
                    <p>Listado de usuarios</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="<?php echo $URL;?>/usuarios/create.php" class="nav-link" style="background-color: #FFD700; color: black;">
                    <i class="far fa-circle nav-icon" style="color: black;"></i>
                    <p>Creación de usuario</p>
                </a>
            </li>
        </ul>
        </li>


 <!-- ROLES   -->   
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-address-card"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de roles</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/roles/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de rol</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
=======

 <!-- CATEGORIAS   -->   
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-tags"></i>
                            <p>
                                Categorías
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/categorias" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de categorías</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
=======

 <!-- ALMACEN -->   
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Almacen
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de productos</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/almacen/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de productos</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
=======

 <!-- PROVEEDORES -->   
>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-car"></i>
                            <p>
                                Proveedores
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/proveedores" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de proveedores</p>
                                </a>
                            </li>
                        </ul>
                    </li>
<<<<<<< HEAD
=======

 <!-- COMPRAS -->   
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-cart-plus"></i>
                            <p>
                                Compras
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de compras</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/compras/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Creación de compra</p>
                                </a>
                            </li>
                        </ul>
                    </li>

  <!-- VENTAS -->                  
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-shopping-basket"></i>
                            <p>
                                Ventas
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de ventas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/ventas/create.php" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Realizar venta</p>
                                </a>
                            </li>
                        </ul>
                    </li>

   <!-- clientes -->                         
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-user-friends"></i>
                            <p>
                                Clientes
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo $URL;?>/clientes" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Listado de clientes</p>
                                </a>
                            </li>
                        </ul>
                    </li>

<!-- PROYECCION -->  

<li class="nav-item">
    <a href="#" class="nav-link active">
        <i class="nav-icon fas fa-chart-line"></i>
        <p>
            Proyección de Ventas
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        <li class="nav-item">
            <a href="<?php echo $URL; ?>/proyeccion/index.php" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Proyección de Ventas</p>
            </a>
        </li>
    </ul>
</li>
<!-- SCRIPT DE PROYECCION -->
<script>
function cargarProyeccionVentas(event) {
    event.preventDefault(); // Evita que se recargue la página

    // Realizar la solicitud AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../proyeccion_ventas/index.php', true);
    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('contenido-dinamico').innerHTML = xhr.responseText;
        } else {
            console.error('Error al cargar el contenido de proyección de ventas');
        }
    };
    xhr.send();
}
</script>



>>>>>>> e916fd0 (Subida del proyecto con correcciones semi final)
                    <li class="nav-item">
                        <a href="<?php echo $URL;?>/app/controllers/login/cerrar_sesion.php" class="nav-link" style="background-color: #ca0a0b">
                            <i class="nav-icon fas fa-door-closed"></i>
                            <p>
                                Cerrar Sesión
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>
