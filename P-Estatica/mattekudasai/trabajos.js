const imagen = document.getElementById("imagen");
const btnAnterior = document.getElementById("anterior");
const btnSiguiente = document.getElementById("siguiente");

let indice = 0;

const imagenes = ["imagenes/trabajos/arreglos/1.jpg", "imagenes/trabajos/arreglos/2.jpg", 
    "imagenes/trabajos/arreglos/3.jpg", "imagenes/trabajos/arreglos/4.jpg", 
    "imagenes/trabajos/arreglos/5.jpg", "imagenes/trabajos/arreglos/6.jpg", 
    "imagenes/trabajos/arreglos/7.jpg", "imagenes/trabajos/arreglos/8.jpg", 
    "imagenes/trabajos/arreglos/9.jpg", "imagenes/trabajos/arreglos/10.jpg", 
    "imagenes/trabajos/arreglos/11.jpg"]


btnSiguiente.addEventListener("click", () => {
  indice = (indice + 1) % imagenes.length;
  imagen.src = imagenes[indice];
});

btnAnterior.addEventListener("click", () => {
  indice = (indice - 1 + imagenes.length) % imagenes.length;
  imagen.src = imagenes[indice];
});



setInterval(() => {
  indice = (indice + 1) % imagenes.length;
  imagen.src = imagenes[indice];
}, 4000); // cada 4 segundos