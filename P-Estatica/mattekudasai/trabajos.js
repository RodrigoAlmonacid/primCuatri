document.addEventListener("DOMContentLoaded", function(){
const imagen1 = document.getElementById("imagen1");
const btnAnterior1 = document.getElementById("anterior1");
const btnSiguiente1 = document.getElementById("siguiente1");
const imagen2 = document.getElementById("imagen2");
const btnAnterior2 = document.getElementById("anterior2");
const btnSiguiente2 = document.getElementById("siguiente2");
const imagen3 = document.getElementById("imagen3");
const btnAnterior3 = document.getElementById("anterior3");
const btnSiguiente3 = document.getElementById("siguiente3");
const imagen4 = document.getElementById("imagen4");
const btnAnterior4 = document.getElementById("anterior4");
const btnSiguiente4 = document.getElementById("siguiente4");

let indice1 = 0;
let indice2 = 0;
let indice3 = 0;
let indice4 = 0;

const imagenes1 = ["imagenes/trabajos/arreglos/2.jpg", 
    "imagenes/trabajos/arreglos/3.jpg", "imagenes/trabajos/arreglos/4.jpg", 
    "imagenes/trabajos/arreglos/5.jpg", "imagenes/trabajos/arreglos/6.jpg", 
    "imagenes/trabajos/arreglos/7.jpg", "imagenes/trabajos/arreglos/8.jpg", 
    "imagenes/trabajos/arreglos/9.jpg", "imagenes/trabajos/arreglos/10.jpg", 
    "imagenes/trabajos/arreglos/11.jpg"]


btnSiguiente1.addEventListener("click", function() {
  indice1 = (indice1 + 1) % imagenes1.length;
  imagen1.src = imagenes1[indice1];
});

btnAnterior1.addEventListener("click", function() {
  indice1 = (indice1 - 1 + imagenes1.length) % imagenes1.length;
  imagen1.src = imagenes1[indice1];
});

const imagenes2 = ["imagenes/trabajos/exterior/2.jpg", 
    "imagenes/trabajos/exterior/3.jpg", "imagenes/trabajos/exterior/4.jpg", 
    "imagenes/trabajos/exterior/5.jpg", "imagenes/trabajos/exterior/6.jpg", 
    "imagenes/trabajos/exterior/7.jpg", "imagenes/trabajos/exterior/8.jpg", 
    "imagenes/trabajos/exterior/9.jpg", "imagenes/trabajos/exterior/10.jpg", 
    "imagenes/trabajos/exterior/11.jpg"]


btnSiguiente2.addEventListener("click", function() {
  indice2 = (indice2 + 1) % imagenes2.length;
  imagen2.src = imagenes2[indice2];
});

btnAnterior2.addEventListener("click", function() {
  indice2 = (indice2 - 1 + imagenes2.length) % imagenes2.length;
  imagen2.src = imagenes2[indice2];
});


const imagenes3 = ["imagenes/trabajos/madera/2.jpg", 
    "imagenes/trabajos/madera/3.jpg", "imagenes/trabajos/madera/4.jpg", 
    "imagenes/trabajos/madera/5.jpg", "imagenes/trabajos/madera/6.jpg", 
    "imagenes/trabajos/madera/7.jpg", "imagenes/trabajos/madera/8.jpg", 
    "imagenes/trabajos/madera/9.jpg", "imagenes/trabajos/madera/10.jpg", 
    "imagenes/trabajos/madera/11.jpg"]


btnSiguiente3.addEventListener("click", function() {
  indice3 = (indice3 + 1) % imagenes3.length;
  imagen3.src = imagenes3[indice3];
});

btnAnterior3.addEventListener("click", function() {
  indice3 = (indice3 - 1 + imagenes3.length) % imagenes3.length;
  imagen3.src = imagenes3[indice3];
});


const imagenes4 = ["imagenes/trabajos/masillado/2.jpg", 
    "imagenes/trabajos/masillado/3.jpg", "imagenes/trabajos/masillado/4.jpg", 
    "imagenes/trabajos/masillado/5.jpg", "imagenes/trabajos/masillado/6.jpg", 
    "imagenes/trabajos/masillado/7.jpg", "imagenes/trabajos/masillado/8.jpg", 
    "imagenes/trabajos/masillado/9.jpg", "imagenes/trabajos/masillado/10.jpg", 
    "imagenes/trabajos/masillado/11.jpg"]


btnSiguiente4.addEventListener("click", function() {
  indice4 = (indice4 + 1) % imagenes4.length;
  imagen4.src = imagenes4[indice4];
});

btnAnterior4.addEventListener("click", function() {
  indice4 = (indice4 - 1 + imagenes4.length) % imagenes4.length;
  imagen4.src = imagenes4[indice4];
});

});
