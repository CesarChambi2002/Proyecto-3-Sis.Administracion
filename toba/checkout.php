<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Finalizar Compra</title>
    <link rel="stylesheet" href="css/styles.css?v=2.0">


    

</head>
<body>
<header>
<nav>
        <ul class="navbar">
            <li><a href="index.php">Inicio</a></li>
        </ul>
    </nav>
    <h1 class="checkout-title">Carrito</h1>
   
</header>

<main class="checkout-main">
    <div class="checkout-container">
        <div class="cart-table">
            <table>
                <thead>
                    <tr>
                        <th></th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="checkout-items">
                    <!-- Aquí se cargarán los productos desde el carrito -->
                </tbody>
            </table>
        </div>

        <div class="cart-summary">
            <h2>Totales del carrito</h2>
            <p><strong>Subtotal:</strong> Bs.<span id="subtotal">0</span></p>
            <p><strong>Total:</strong> Bs.<span id="total">0</span></p>
            <button id="finalize-btn" class="whatsapp-btn">Completar el pedido por WhatsApp</button>
        </div>
    </div>

    <footer class="checkout-footer">
        <div class="footer-details">
            <div>
                <p>Horarios de atención: De Lunes a Domingo de 9:30 a 21:30</p>
            </div>
            <div>
                <p><a href="#">¿Tienes dudas? Contáctanos aquí</a></p>
            </div>
        </div>
        <div class="footer-branding">
            <img src="images/logo.png" alt="My Games Now" class="logo">
        </div>
        <div class="footer-payment">
            <h4>Métodos de pago</h4>
            <div class="payment-icons">
                <img src="images/payment-yape.png" alt="Yape">
                <img src="images/payment-tigo.png" alt="Tigo">
                <img src="images/payment-paypal.png" alt="PayPal">
                <img src="images/payment-binance.png" alt="Binance">
            </div>
        </div>
    </footer>
</main>

<script>
    // Obtener los datos del carrito desde el almacenamiento local
    document.addEventListener("DOMContentLoaded", () => {
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const checkoutItems = document.getElementById("checkout-items");
        const subtotalElement = document.getElementById("subtotal");
        const totalElement = document.getElementById("total");

        let subtotal = 0;

        cart.forEach(item => {
            subtotal += item.price * item.quantity;

            const row = document.createElement("tr");
            row.innerHTML = `
                <td><img src="images/${item.image}" alt="${item.name}" class="cart-item-image"></td>
                <td>${item.name}</td>
                <td>Bs.${item.price.toFixed(2)}</td>
                <td>${item.quantity}</td>
                <td>Bs.${(item.price * item.quantity).toFixed(2)}</td>
            `;
            checkoutItems.appendChild(row);
        });

        subtotalElement.textContent = subtotal.toFixed(2);
        totalElement.textContent = subtotal.toFixed(2);

        // Botón de WhatsApp
        const finalizeBtn = document.getElementById("finalize-btn");
        finalizeBtn.addEventListener("click", () => {
            const whatsappMessage = cart.map(item => `${item.name} - ${item.quantity} x Bs.${item.price.toFixed(2)} = Bs.${(item.quantity * item.price).toFixed(2)}`).join("\n");
            const totalMessage = `Total: Bs.${subtotal.toFixed(2)}`;
            const encodedMessage = encodeURIComponent(`Hola, quiero realizar el siguiente pedido:\n\n${whatsappMessage}\n\n${totalMessage}`);
            const phoneNumber = "59178604865"; // Número de WhatsApp
            window.open(`https://wa.me/${phoneNumber}?text=${encodedMessage}`, "_blank");
        });
    });
</script>



</body>
</html>
