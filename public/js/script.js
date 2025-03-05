//Ajax fetch
document.addEventListener("DOMContentLoaded", () => {
    console.log("Página cargada, iniciando fetch...");
    fetch("../productos.json")
        .then(response => {
            if (!response.ok) {
                throw new Error("No se pudo cargar el archivo JSON");
            }
            return response.json();
        })
        .then(data => {
            console.log("Productos cargados:", data);
            const productosDestacadosContainer = document.getElementById("productosDestacados");
            productosDestacadosContainer.innerHTML = "";

            const productosDestacados = data.productos.slice(0, 3);
            productosDestacados.forEach(producto => {
                const productoHTML = `
                    <div class="col-md-4">
                        <div class="card">
                            <img src="${producto.imagen}" class="card-img-top" alt="${producto.nombre}" onerror="this.src='./img/default.jpg';">
                            <div class="card-body text-center">
                                <h5 class="card-title" tabindex="0">${producto.nombre}</h5>
                                <p class="card-text">${producto.precio.toFixed(2)}€</p>
                                <button class="btn btn-primary addToCart" data-nombre="${producto.nombre}" data-precio="${producto.precio}">Añadir al carrito</button>
                            </div>
                        </div>
                    </div>
                `;
                productosDestacadosContainer.innerHTML += productoHTML;
            });

            // Volver a añadir los event listeners a los botones
            asignarEventosCarrito();
        })
        .catch(error => {
            console.error("Error al cargar los productos o el archivo JSON:", error);
        });
});


// Añadir al carrito
function asignarEventosCarrito() {
    const botonesAgregarCarrito = document.querySelectorAll(".addToCart");

    botonesAgregarCarrito.forEach(boton => {
        boton.addEventListener("click", function () {
            const nombreProducto = this.getAttribute("data-nombre");
            const precioProducto = parseFloat(this.getAttribute("data-precio"));

            // Verifica si el precio es un número válido
            if (isNaN(precioProducto)) {
                console.error("Precio inválido del producto");
                return;
            }

            let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
            carrito.push({ nombre: nombreProducto, precio: precioProducto });

            // Guarda el carrito actualizado
            localStorage.setItem("carrito", JSON.stringify(carrito));

            // Actualiza el contador del carrito
            actualizarCarrito();
        });
    });
}

// Contador de productos en el carrito
function actualizarCarrito() {
    let carrito = JSON.parse(localStorage.getItem("carrito")) || [];
    const carritoCount = document.getElementById("cart-count");
    carritoCount.textContent = carrito.length;

    // Mostrar mensaje si el carrito está vacío
    const mensajeCarritoVacio = document.getElementById("carrito-vacio");
    if (carrito.length === 0) {
        mensajeCarritoVacio.style.display = "block";
    } else {
        mensajeCarritoVacio.style.display = "none";
    }
}

// Asegurar que el carrito se actualice al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    actualizarCarrito();
    asignarEventosCarrito(); // Para asignar los eventos de los botones
});


//Login 
document.addEventListener("DOMContentLoaded", function () {
    document.getElementById("loginForm").addEventListener("submit", function (event) {
        event.preventDefault();

        const email = document.getElementById("email").value;
        const password = document.getElementById("password").value;

        // Simulación de autenticación
        if (email === "admin@atleti.com" && password === "123456") {
            alert("Inicio de sesión exitoso");
            localStorage.setItem("user", email);
            document.getElementById("loginModal").querySelector(".btn-close").click(); // Cierra el modal
        } else {
            alert("Credenciales incorrectas");
        }
    });
});


document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleMode");
    const body = document.body;

    // Función para obtener el valor de una cookie
    function getCookie(name) {
        const cookies = document.cookie.split("; ");
        for (let cookie of cookies) {
            let [key, value] = cookie.split("=");
            if (key === name) return value;
        }
        return null;
    }

    // Función para establecer una cookie
    function setCookie(name, value, days) {
        let expires = "";
        if (days) {
            const date = new Date();
            date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = `${name}=${value}; path=/;${expires}`;
    }

    // Función para aplicar el modo oscuro
    function applyDarkMode() {
        body.style.backgroundColor = "#121212";
        body.style.color = "white";
        toggleButton.textContent = "Modo Claro";
    }

    // Función para aplicar el modo claro
    function applyLightMode() {
        body.style.backgroundColor = "white";
        body.style.color = "black";
        toggleButton.textContent = "Modo Oscuro";
    }

    // Verificar la cookie al cargar la página
    if (getCookie("theme") === "dark") {
        applyDarkMode();
    } else {
        applyLightMode();
    }

    // Evento para cambiar el tema
    toggleButton.addEventListener("click", function () {
        if (getCookie("theme") === "dark") {
            applyLightMode();
            setCookie("theme", "light", 30); // Guardar la preferencia por 30 días
        } else {
            applyDarkMode();
            setCookie("theme", "dark", 30);
        }
    });
});





//Aviso de cookie
document.addEventListener("DOMContentLoaded", function () {
    if (!document.cookie.includes("cookies_aceptadas=true") && !document.cookie.includes("cookies_rechazadas=true")) {
        mostrarAvisoCookies();
    }
});

function mostrarAvisoCookies() {
    let aviso = document.createElement("div");
    aviso.id = "aviso-cookies";
    aviso.innerHTML = `
                <div style="position: fixed; bottom: 20px; left: 20px; right: 20px; background: #222; color: #fff; padding: 15px; text-align: center; z-index: 1000; border-radius: 5px;">
                    <p>Este sitio web utiliza cookies para mejorar la experiencia del nick. <a href="#" style="color: #4CAF50;">Más información</a></p>
                    <button id="aceptar-cookies" style="background: #4CAF50; color: white; border: none; padding: 10px 20px; cursor: pointer;">Aceptar</button>
                    <button id="rechazar-cookies" style="background: #f44336; color: white; border: none; padding: 10px 20px; cursor: pointer;">Rechazar</button>
                </div>
            `;
    document.body.appendChild(aviso);

    document.getElementById("aceptar-cookies").addEventListener("click", function () {
        document.cookie = "cookies_aceptadas=true; path=/; max-age=" + (60 * 60 * 24 * 365);
        aviso.remove();
    });

    document.getElementById("rechazar-cookies").addEventListener("click", function () {
        document.cookie = "cookies_rechazadas=true; path=/; max-age=" + (60 * 60 * 24 * 365);
        aviso.remove();
    });
}

// Función para cerrar sesión
function cerrarSesion() {
    localStorage.removeItem('nick');  // Eliminar el nick de localStorage
    mostrarnick();  // Llamar para actualizar la interfaz
}

// Función para mostrar el nombre del nick si está logueado
function mostrarnick() {
    const nick = localStorage.getItem('nick');
    const userInfo = document.getElementById('user-info');
    const loginLink = document.getElementById('login-link');  // Suponiendo que haya un enlace de login

    if (nick) {
        // Si el nick está logueado, mostrar su nombre
        userInfo.textContent = `Hola, ${nick}`;
        // Ocultar enlace de login si ya está logueado
        if (loginLink) {
            loginLink.style.display = 'none';
        }
    } else {
        // Si no hay nick logueado, mostrar mensaje o permitir iniciar sesión
        userInfo.textContent = '';  // No mostrar nada si no está logueado
        // Mostrar el enlace de login si no está logueado
        if (loginLink) {
            loginLink.style.display = 'block';
        }
    }
}

mostrarnick();

