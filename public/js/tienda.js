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
