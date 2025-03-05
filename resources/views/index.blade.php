<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <header class="bg-danger text-white text-center py-3">
        <h1>Atlético de Madrid - Tienda Oficial</h1>
    </header>
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <div class="d-flex">
                <span id="user-info" class="text-light me-3"></span>
                <button class="btn btn-sm btn-danger" onclick="cerrarSesion()">Cerrar sesión</button>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item"><a class="nav-link" href="/index.html">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="tienda.html">Tienda</a></li>
                    <li class="nav-item"><a class="nav-link" href="novedades.html">Novedades</a></li>
                </ul>
            </div>
            <a href="login.html" class="btn btn-outline-primary me-2">Login</a>
            <button id="toggleMode" class="btn btn-outline-light ms-2">Modo Oscuro</button>
            <a href="carrito.html" class="btn btn-outline-warning ms-2 position-relative">
                <i id="cart-count" class="bi bi-cart"></i> Carrito
            </a>
        </div>
    </nav>
    
    <div class="container mt-3 text-center">
        <div class="d-flex align-items-center justify-content-center">
            <div class="input-group w-50">
                <input type="text" id="searchBar" class="form-control" placeholder="Buscar productos...">
                <button id="searchButton" class="btn btn-secondary">
                    <i class="bi bi-search"></i>
                </button>
                <button id="voiceSearch" class="btn btn-primary">
                    <i class="bi bi-mic"></i>
                </button>
            </div>
        </div>
        <div id="searchResults" class="search-results"></div>
    </div>
    <div class="container mt-4">
        <div id="productos" class="row"></div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            fetch('http://127.0.0.1:8000/api/camisetas')
                .then(response => response.json())
                .then(data => {
                    let contenedor = document.getElementById('productos');
                    contenedor.innerHTML = "";
                    data.forEach(camiseta => {
                        let div = document.createElement('div');
                        div.classList.add('col-md-4', 'mb-3');
                        div.innerHTML = `
                            <div class="card">
                                <img src="${camiseta.imagen}" class="card-img-top" alt="${camiseta.nombre}">
                                <div class="card-body">
                                    <h5 class="card-title">${camiseta.nombre}</h5>
                                    <p class="card-text">${camiseta.descripcion}</p>
                                    <p class="text-danger fw-bold">Precio: $${camiseta.precio}</p>
                                    <button class="btn btn-primary" onclick="agregarAlCarrito(${camiseta.id})">Añadir al carrito</button>
                                </div>
                            </div>
                        `;
                        contenedor.appendChild(div);
                    });
                })
                .catch(error => console.error('Error al obtener camisetas:', error));
        });

        function agregarAlCarrito(id) {
            alert('Camiseta con ID ' + id + ' añadida al carrito.');
        }
    </script>
</body>
</html>
