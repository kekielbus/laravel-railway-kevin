document.addEventListener("DOMContentLoaded", function () {
    cargarCamisetas();
});

function cargarCamisetas() {
    fetch("http://127.0.0.1:8000/api/camisetas") // Cambia esto si usas otro puerto
        .then(response => response.json())
        .then(data => mostrarCamisetas(data))
        .catch(error => console.error("Error al obtener camisetas:", error));
}

function mostrarCamisetas(camisetas) {
    let contenedor = document.getElementById("escaparate");
    contenedor.innerHTML = ""; // Limpiamos antes de agregar nuevas

    camisetas.forEach(camiseta => {
        let card = document.createElement("div");
        card.classList.add("camiseta-card");
        card.innerHTML = `
            <h2>${camiseta.nombre}</h2>
            <p>Precio: ${camiseta.precio}€</p>
            <p>${camiseta.descripcion}</p>
        `;
        contenedor.appendChild(card);
    });
}
