<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Origen Gamer Store - Productos</title>
    <link rel="stylesheet" href="css/styles.css?v=2.0">


    

</head>
<body>

<header>
<nav>
        <ul class="navbar">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="#contact">Contacto</a></li>
        </ul>
    </nav>
    <h1>Origen Gamer Store</h1>
    <p>¡Tienda de componentes y periféricos Gamer con envíos a toda Bolivia!</p>
</header>

<main>
    <div class="search-bar">
        <input type="text" placeholder="Buscar productos..." id="search" oninput="buscarProductos()">
        <select id="category-filter" onchange="buscarProductos()">
            <option value="">Todas las categorías</option>
        </select>
    </div>

    <div class="products-container" id="products-container">
        <!-- Los productos se cargarán aquí dinámicamente desde la base de datos -->
    </div>
</main>

<!-- Modal para mostrar detalles del producto -->
<div id="productModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div id="modal-product-details">
            <!-- Aquí se cargará la información del producto seleccionado -->
        </div>
        <div class="modal-footer">
            <input type="number" id="product-quantity" value="1" min="1">
            <button onclick="addToCart()">Agregar Bs.<span id="product-price"></span></button>
        </div>
    </div>
</div>

<!-- Botón de Carrito y Panel de Carrito -->
<div id="cart-button" onclick="toggleCart()">
    <span id="cart-count">0</span>
</div>

<div id="cart-panel" class="cart-panel">
    <div class="cart-header">
        <span>Tu carrito</span>
        <span class="close-cart" onclick="toggleCart()">&times;</span>
    </div>
    <div id="cart-items">
        <!-- Aquí se mostrarán los productos agregados al carrito -->
    </div>
    <div class="cart-footer">
        <p>Subtotal: Bs.<span id="cart-total">0</span></p>
        <button onclick="finalizePurchase()">Finalizar Compra</button>
    </div>
</div>

<script src="js/script.js"></script>



<footer id="contact">
    <h2>Contacto</h2>
    <p>Si tienes alguna duda o consulta, contáctanos:</p>
    <p><strong>Email:</strong> soporte@origenstore.com</p>
    <p><strong>Teléfono:</strong> +591 78604865</p>
    <p><strong>Dirección:</strong> Calle Principal, La Paz, Bolivia</p>
</footer>
</body>
</html>
