import './bootstrap';
document.addEventListener('DOMContentLoaded', function () {
    // Hacer la solicitud AJAX para obtener las camisetas de la API de Laravel
    fetch('http://localhost:8000/api/camisetas')  // Asegúrate de que la URL coincida con la de tu servidor
        .then(response => response.json())
        .then(data => {
            // Obtener el contenedor donde se mostrarán los productos
            const productCarousel = document.getElementById('product-carousel');
            
            // Iterar sobre cada camiseta para crear un elemento HTML por cada una
            data.forEach(camiseta => {
                const productElement = document.createElement('div');
                productElement.classList.add('product-card');
                productElement.innerHTML = `
                    <img src="${camiseta.foto}" alt="${camiseta.nombre}">
                    <h3>${camiseta.nombre}</h3>
                    <p>Precio: ${camiseta.precio} €</p>
                    <p>${camiseta.descripcion}</p>
                `;
                productCarousel.appendChild(productElement);
            });
        })
        .catch(error => {
            console.error('Error al cargar las camisetas:', error);
        });
});
