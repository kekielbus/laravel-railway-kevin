<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaparate Atlético de Madrid</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('logo-atletico-de-madrid.jpg') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="js/script.js"></script>
</head>

<body>
    <!-- Cabecera -->
    <header class="bg-danger text-white text-center py-3">
        <h1>Atlético de Madrid - Tienda Oficial</h1>
    </header>

    <!-- Navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Menú de navegación principal">

        <div class="container">
            <div class="d-flex">
        <span id="user-info" class="text-light me-3"></span> <!-- Aquí se mostrará el nombre del usuario -->
        <button class="btn btn-sm btn-danger" onclick="cerrarSesion()">Cerrar sesión</button> <!-- Cierra sesión -->
    </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu"
    aria-controls="menu" aria-label="Abrir menú de navegación">
    <span class="navbar-toggler-icon" aria-hidden="true"></span>
</button>

            <div class="collapse navbar-collapse" id="menu">
            <ul class="navbar-nav mx-auto">
    <li class="nav-item"><a class="nav-link" href="{{ route('inicio') }}">Inicio</a></li>
    <li class="nav-item"><a class="nav-link" href="{{ route('tienda') }}">Tienda</a></li>
</ul>

            </div>
            <a href="html/login.html" class="btn btn-outline-primary me-2" role="button" aria-label="Acción específica del botón">
                Login
            </a>            
            <button id="toggleMode" class="btn btn-outline-light ms-2">Modo Oscuro</button>
            <a href="html/carrito.html" class="btn btn-outline-warning ms-2 position-relative">
                <i id="cart-count" class="bi bi-cart"></i> Carrito
            </a>
        </div>
        </div>
    </nav>



    <!-- Carrusel -->
    <section class="container mt-4">
      <!-- Carrusel -->
<div id="miCarrusel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="/img/index.jpeg" class="d-block w-100" alt="Imagen 1">
        </div>
        <div class="carousel-item">
            <img src="/img/elegante.jpeg" class="d-block w-100" alt="Imagen 2">
        </div>
        <div class="carousel-item">
            <img src="/img/entera.jpeg" class="d-block w-100" alt="Imagen 3">
        </div>
    </div>
</div>

    </section>
    <!-- Productos Destacados -->
    <section class="container mt-4">
        <h2 class="text-center">Productos Destacados</h2>
        <div class="row" id="productosDestacados">
            <!-- Aquí se insertarán los productos dinámicamente -->
        </div>
    </section>


    <!-- Pie de página -->
<footer class="bg-dark text-white text-center py-4 mt-4">
    <div class="container">
        <div class="row">
            <!-- Columna de texto -->
            <div class="col-12 col-md-6">
                <p>2025 Atlético de Madrid - Todos los derechos reservados</p>
            </div>

            <!-- Columna de enlaces -->
            <div class="col-12 col-md-6">
                <div class="footer-links d-flex justify-content-center">
                    <a href="{{ route('licencia') }}" class="text-white mx-2">Licencia</a>
                    <a href="{{ route('licencia') }}" class="text-white mx-2">Aviso legal</a>
                    <a href="{{ route('licencia') }}" class="text-white mx-2">Privacidad del sitio</a>
                    <a href="{{ route('licencia') }}" class="text-white mx-2">Condiciones de uso</a>
                </div>
            </div>

            <!-- Sección de contacto -->
            <div class="col-12 text-center mt-3">
                <h5>Contacto</h5>
                <p><i class="fas fa-phone"></i> 912 345 674</p>
                <p><i class="fas fa-map-marker-alt"></i> Calle Eduardo Barreiros, 6</p>
            </div>
        </div>
    </div>
</footer>



</body>

</html>