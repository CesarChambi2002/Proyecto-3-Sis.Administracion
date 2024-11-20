document.addEventListener("DOMContentLoaded", () => {
    cargarCategorias();
    cargarProductos();
});

function cargarCategorias() {
    fetch('php/connect.php?categorias=true')
        .then(response => response.json())
        .then(data => {
            const categoryFilter = document.getElementById("category-filter");
            data.forEach(categoria => {
                const option = document.createElement("option");
                option.value = categoria.id_categoria;
                option.textContent = categoria.nombre_categoria;
                categoryFilter.appendChild(option);
            });
        })
        .catch(error => console.error('Error al cargar las categorías:', error));
}

function cargarProductos(filtroNombre = "", filtroCategoria = "") {
    const productsContainer = document.getElementById("products-container");
    productsContainer.innerHTML = "";

    let url = `php/connect.php?nombre=${filtroNombre}&categoria=${filtroCategoria}`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.forEach(producto => {
                const productCard = document.createElement("div");
                productCard.classList.add("product-card");

                if (producto.stock <= 0) {
                    // Producto sin stock
                    productCard.classList.add("out-of-stock-product");
                    productCard.innerHTML = `
                        <div class="overlay-out-of-stock">Agotado</div>
                        <img src="images/${producto.imagen}" alt="${producto.nombre}">
                        <h2>${producto.nombre}</h2>
                        <p>${producto.precio_venta} Bs.</p>
                    `;
                    productCard.style.pointerEvents = "none"; // Deshabilitar clic
                } else {
                    // Producto disponible
                    productCard.innerHTML = `
                        <img src="images/${producto.imagen}" alt="${producto.nombre}" onclick="mostrarModal(${JSON.stringify(producto).replace(/"/g, '&quot;')})">
                        <h2>${producto.nombre}</h2>
                        <p>${producto.precio_venta} Bs.</p>
                    `;
                }

                productsContainer.appendChild(productCard);
            });
        })
        .catch(error => console.error('Error al cargar los productos:', error));
}

function buscarProductos() {
    const filtroNombre = document.getElementById("search").value;
    const filtroCategoria = document.getElementById("category-filter").value;
    cargarProductos(filtroNombre, filtroCategoria);
}

function mostrarModal(producto) {
    if (producto.stock <= 0) {
        alert("Este producto está agotado y no puede ser agregado al carrito.");
        return; // Evitar mostrar el modal si el producto está agotado
    }

    const modal = document.getElementById("productModal");
    const modalProductDetails = document.getElementById("modal-product-details");
    const productPrice = document.getElementById("product-price");

    modalProductDetails.innerHTML = `
        <img src="images/${producto.imagen}" alt="${producto.nombre}">
        <h2>${producto.nombre}</h2>
        <p>${producto.descripcion || "No hay descripción disponible."}</p>
    `;

    productPrice.textContent = producto.precio_venta;
    modal.setAttribute("data-product", JSON.stringify(producto)); // Guardar producto en el modal
    modal.style.display = "block";
}

function closeModal() {
    document.getElementById("productModal").style.display = "none";
}

let cart = []; // Carrito para almacenar los productos

function addToCart() {
    const quantity = parseInt(document.getElementById("product-quantity").value);
    const productData = JSON.parse(document.getElementById("productModal").getAttribute("data-product"));

    if (productData.stock <= 0) {
        alert("Este producto está agotado y no puede ser agregado al carrito.");
        return; // Evitar agregar productos agotados al carrito
    }

    const item = {
        id: productData.id_producto,
        name: productData.nombre,
        price: parseFloat(productData.precio_venta),
        quantity: quantity,
        image: productData.imagen
    };

    const existingItem = cart.find(cartItem => 
        cartItem.id === item.id && 
        cartItem.name === item.name && 
        cartItem.price === item.price
    );

    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push(item);
    }

    updateCart();
    closeModal();
}

function updateCart() {
    const cartCount = document.getElementById("cart-count");
    const cartItemsContainer = document.getElementById("cart-items");
    const cartTotal = document.getElementById("cart-total");

    cartCount.textContent = cart.reduce((total, item) => total + item.quantity, 0);
    cartItemsContainer.innerHTML = "";

    let total = 0;

    cart.forEach(item => {
        total += item.price * item.quantity;

        const cartItem = document.createElement("div");
        cartItem.classList.add("cart-item");
        cartItem.innerHTML = `
            <img src="images/${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-details">
                <p><strong>${item.name}</strong></p>
                <p>${item.quantity} x ${item.price.toFixed(2)} Bs. = ${(item.quantity * item.price).toFixed(2)} Bs.</p>
            </div>
            <button class="remove-item" onclick="removeFromCart(${item.id})">🗑️</button>
        `;
        cartItemsContainer.appendChild(cartItem);
    });

    cartTotal.textContent = total.toFixed(2);
}

function removeFromCart(id) {
    cart = cart.filter(item => item.id !== id);
    updateCart();
}

function toggleCart() {
    const cartPanel = document.getElementById("cart-panel");
    cartPanel.style.display = cartPanel.style.display === "block" ? "none" : "block";
}

function finalizePurchase() {
    localStorage.setItem("cart", JSON.stringify(cart)); // Guardar el carrito en localStorage
    window.location.href = "checkout.php"; // Redirigir al apartado de finalizar compra
}

window.onclick = function(event) {
    const modal = document.getElementById("productModal");
    const cartPanel = document.getElementById("cart-panel");
    if (event.target == modal) {
        closeModal();
    } else if (event.target == cartPanel) {
        toggleCart();
    }
}
