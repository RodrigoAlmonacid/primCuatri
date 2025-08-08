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
const imagen5 = document.getElementById("imagen5");
const btnAnterior5 = document.getElementById("anterior5");
const btnSiguiente5 = document.getElementById("siguiente5");

let indice1 = 0;
let indice2 = 0;
let indice3 = 0;
let indice4 = 0;
let indice5 = 0;

const imagenes1 = ["imagenes/trabajos/arreglos/1.jpg", "imagenes/trabajos/arreglos/2.jpg", 
    "imagenes/trabajos/arreglos/3.jpg", "imagenes/trabajos/arreglos/4.jpg", 
    "imagenes/trabajos/arreglos/5.jpg", "imagenes/trabajos/arreglos/6.jpg", 
    "imagenes/trabajos/arreglos/7.jpg", "imagenes/trabajos/arreglos/8.jpg", 
    "imagenes/trabajos/arreglos/9.jpg", "imagenes/trabajos/arreglos/10.jpg", 
    "imagenes/trabajos/arreglos/11.jpg", "imagenes/trabajos/arreglos/12.jpg", 
    "imagenes/trabajos/arreglos/13.jpg", "imagenes/trabajos/arreglos/14.jpg", 
    "imagenes/trabajos/arreglos/15.jpg", "imagenes/trabajos/arreglos/16.jpg", 
    "imagenes/trabajos/arreglos/17.jpg", "imagenes/trabajos/arreglos/18.jpg", 
    "imagenes/trabajos/arreglos/19.jpg", "imagenes/trabajos/arreglos/20.jpg",
    "imagenes/trabajos/arreglos/21.jpg", "imagenes/trabajos/arreglos/22.jpg", 
    "imagenes/trabajos/arreglos/23.jpg", "imagenes/trabajos/arreglos/24.jpg", 
    "imagenes/trabajos/arreglos/25.jpg", "imagenes/trabajos/arreglos/26.jpg", 
    "imagenes/trabajos/arreglos/27.jpg", "imagenes/trabajos/arreglos/28.jpg", 
    "imagenes/trabajos/arreglos/29.jpg", "imagenes/trabajos/arreglos/30.jpg"]


btnSiguiente1.addEventListener("click", function() {
  indice1 = (indice1 + 1) % imagenes1.length;
  imagen1.src = imagenes1[indice1];
});

btnAnterior1.addEventListener("click", function() {
  indice1 = (indice1 - 1 + imagenes1.length) % imagenes1.length;
  imagen1.src = imagenes1[indice1];
});

const imagenes2 = ["imagenes/trabajos/impermeabilizante/1.jpg", "imagenes/trabajos/impermeabilizante/2.jpg", 
    "imagenes/trabajos/impermeabilizante/3.jpg", "imagenes/trabajos/impermeabilizante/4.jpg", 
    "imagenes/trabajos/impermeabilizante/5.jpg", "imagenes/trabajos/impermeabilizante/6.jpg", 
    "imagenes/trabajos/impermeabilizante/7.jpg", "imagenes/trabajos/impermeabilizante/8.jpg", 
    "imagenes/trabajos/impermeabilizante/9.jpg", "imagenes/trabajos/impermeabilizante/10.jpg", 
    "imagenes/trabajos/impermeabilizante/11.jpg", "imagenes/trabajos/impermeabilizante/12.jpg", 
    "imagenes/trabajos/impermeabilizante/13.jpg", "imagenes/trabajos/impermeabilizante/14.jpg", 
    "imagenes/trabajos/impermeabilizante/15.jpg", "imagenes/trabajos/impermeabilizante/16.jpg", 
    "imagenes/trabajos/impermeabilizante/17.jpg", "imagenes/trabajos/impermeabilizante/18.jpg", 
    "imagenes/trabajos/impermeabilizante/19.jpg", "imagenes/trabajos/impermeabilizante/20.jpg",
    "imagenes/trabajos/impermeabilizante/21.jpg", "imagenes/trabajos/impermeabilizante/22.jpg", 
    "imagenes/trabajos/impermeabilizante/23.jpg", "imagenes/trabajos/impermeabilizante/24.jpg", 
    "imagenes/trabajos/impermeabilizante/25.jpg", "imagenes/trabajos/impermeabilizante/26.jpg", 
    "imagenes/trabajos/impermeabilizante/27.jpg", "imagenes/trabajos/impermeabilizante/28.jpg", 
    "imagenes/trabajos/impermeabilizante/29.jpg", "imagenes/trabajos/impermeabilizante/30.jpg",
    "imagenes/trabajos/impermeabilizante/31.jpg", "imagenes/trabajos/impermeabilizante/32.jpg", 
    "imagenes/trabajos/impermeabilizante/33.jpg", "imagenes/trabajos/impermeabilizante/34.jpg", 
    "imagenes/trabajos/impermeabilizante/35.jpg", "imagenes/trabajos/impermeabilizante/36.jpg", 
    "imagenes/trabajos/impermeabilizante/37.jpg", "imagenes/trabajos/impermeabilizante/38.jpg", 
    "imagenes/trabajos/impermeabilizante/39.jpg", "imagenes/trabajos/impermeabilizante/40.jpg"]


btnSiguiente2.addEventListener("click", function() {
  indice2 = (indice2 + 1) % imagenes2.length;
  imagen2.src = imagenes2[indice2];
});

btnAnterior2.addEventListener("click", function() {
  indice2 = (indice2 - 1 + imagenes2.length) % imagenes2.length;
  imagen2.src = imagenes2[indice2];
});


const imagenes3 = ["imagenes/trabajos/madera/1.jpg", "imagenes/trabajos/madera/2.jpg", 
    "imagenes/trabajos/madera/3.jpg", "imagenes/trabajos/madera/4.jpg", 
    "imagenes/trabajos/madera/5.jpg", "imagenes/trabajos/madera/6.jpg", 
    "imagenes/trabajos/madera/7.jpg", "imagenes/trabajos/madera/8.jpg", 
    "imagenes/trabajos/madera/9.jpg", "imagenes/trabajos/madera/10.jpg", 
    "imagenes/trabajos/madera/11.jpg", "imagenes/trabajos/madera/12.jpg", 
    "imagenes/trabajos/madera/13.jpg", "imagenes/trabajos/madera/14.jpg", 
    "imagenes/trabajos/madera/15.jpg", "imagenes/trabajos/madera/16.jpg", 
    "imagenes/trabajos/madera/17.jpg", "imagenes/trabajos/madera/18.jpg", 
    "imagenes/trabajos/madera/19.jpg", "imagenes/trabajos/madera/20.jpg",
    "imagenes/trabajos/madera/21.jpg", "imagenes/trabajos/madera/22.jpg", 
    "imagenes/trabajos/madera/23.jpg", "imagenes/trabajos/madera/24.jpg", 
    "imagenes/trabajos/madera/25.jpg", "imagenes/trabajos/madera/26.jpg", 
    "imagenes/trabajos/madera/27.jpg", "imagenes/trabajos/madera/28.jpg", 
    "imagenes/trabajos/madera/29.jpg", "imagenes/trabajos/madera/30.jpg",
    "imagenes/trabajos/madera/31.jpg", "imagenes/trabajos/madera/32.jpg", 
    "imagenes/trabajos/madera/33.jpg", "imagenes/trabajos/madera/34.jpg", 
    "imagenes/trabajos/madera/35.jpg", "imagenes/trabajos/madera/36.jpg", 
    "imagenes/trabajos/madera/37.jpg", "imagenes/trabajos/madera/38.jpg", 
    "imagenes/trabajos/madera/39.jpg", "imagenes/trabajos/madera/40.jpg"]


btnSiguiente3.addEventListener("click", function() {
  indice3 = (indice3 + 1) % imagenes3.length;
  imagen3.src = imagenes3[indice3];
});

btnAnterior3.addEventListener("click", function() {
  indice3 = (indice3 - 1 + imagenes3.length) % imagenes3.length;
  imagen3.src = imagenes3[indice3];
});


const imagenes4 = ["imagenes/trabajos/pared_pintada/1.jpg", "imagenes/trabajos/pared_pintada/2.jpg", 
    "imagenes/trabajos/pared_pintada/3.jpg", "imagenes/trabajos/pared_pintada/4.jpg", 
    "imagenes/trabajos/pared_pintada/5.jpg", "imagenes/trabajos/pared_pintada/6.jpg", 
    "imagenes/trabajos/pared_pintada/7.jpg", "imagenes/trabajos/pared_pintada/8.jpg", 
    "imagenes/trabajos/pared_pintada/9.jpg", "imagenes/trabajos/pared_pintada/10.jpg", 
    "imagenes/trabajos/pared_pintada/11.jpg", "imagenes/trabajos/pared_pintada/12.jpg", 
    "imagenes/trabajos/pared_pintada/13.jpg", "imagenes/trabajos/pared_pintada/14.jpg", 
    "imagenes/trabajos/pared_pintada/15.jpg", "imagenes/trabajos/pared_pintada/16.jpg", 
    "imagenes/trabajos/pared_pintada/17.jpg", "imagenes/trabajos/pared_pintada/18.jpg", 
    "imagenes/trabajos/pared_pintada/19.jpg", "imagenes/trabajos/pared_pintada/20.jpg",
    "imagenes/trabajos/pared_pintada/21.jpg", "imagenes/trabajos/pared_pintada/22.jpg", 
    "imagenes/trabajos/pared_pintada/23.jpg", "imagenes/trabajos/pared_pintada/24.jpg", 
    "imagenes/trabajos/pared_pintada/25.jpg", "imagenes/trabajos/pared_pintada/26.jpg", 
    "imagenes/trabajos/pared_pintada/27.jpg", "imagenes/trabajos/pared_pintada/28.jpg", 
    "imagenes/trabajos/pared_pintada/29.jpg", "imagenes/trabajos/pared_pintada/30.jpg",
    "imagenes/trabajos/pared_pintada/31.jpg", "imagenes/trabajos/pared_pintada/32.jpg", 
    "imagenes/trabajos/pared_pintada/33.jpg", "imagenes/trabajos/pared_pintada/34.jpg", 
    "imagenes/trabajos/pared_pintada/35.jpg", "imagenes/trabajos/pared_pintada/36.jpg", 
    "imagenes/trabajos/pared_pintada/37.jpg", "imagenes/trabajos/pared_pintada/38.jpg", 
    "imagenes/trabajos/pared_pintada/39.jpg", "imagenes/trabajos/pared_pintada/40.jpg"]


btnSiguiente4.addEventListener("click", function() {
  indice4 = (indice4 + 1) % imagenes4.length;
  imagen4.src = imagenes4[indice4];
});

btnAnterior4.addEventListener("click", function() {
  indice4 = (indice4 - 1 + imagenes4.length) % imagenes4.length;
  imagen4.src = imagenes4[indice4];
});

const imagenes5 = ["imagenes/trabajos/pintura_color/1.jpg", "imagenes/trabajos/pintura_color/2.jpg", 
    "imagenes/trabajos/pintura_color/3.jpg", "imagenes/trabajos/pintura_color/4.jpg", 
    "imagenes/trabajos/pintura_color/5.jpg", "imagenes/trabajos/pintura_color/6.jpg", 
    "imagenes/trabajos/pintura_color/7.jpg", "imagenes/trabajos/pintura_color/8.jpg", 
    "imagenes/trabajos/pintura_color/9.jpg", "imagenes/trabajos/pintura_color/10.jpg", 
    "imagenes/trabajos/pintura_color/11.jpg", "imagenes/trabajos/pintura_color/12.jpg", 
    "imagenes/trabajos/pintura_color/13.jpg", "imagenes/trabajos/pintura_color/14.jpg", 
    "imagenes/trabajos/pintura_color/15.jpg", "imagenes/trabajos/pintura_color/16.jpg", 
    "imagenes/trabajos/pintura_color/17.jpg", "imagenes/trabajos/pintura_color/18.jpg", 
    "imagenes/trabajos/pintura_color/19.jpg", "imagenes/trabajos/pintura_color/20.jpg",
    "imagenes/trabajos/pintura_color/21.jpg", "imagenes/trabajos/pintura_color/22.jpg", 
    "imagenes/trabajos/pintura_color/23.jpg", "imagenes/trabajos/pintura_color/24.jpg", 
    "imagenes/trabajos/pintura_color/25.jpg", "imagenes/trabajos/pintura_color/26.jpg", 
    "imagenes/trabajos/pintura_color/27.jpg", "imagenes/trabajos/pintura_color/28.jpg", 
    "imagenes/trabajos/pintura_color/29.jpg", "imagenes/trabajos/pintura_color/30.jpg",
    "imagenes/trabajos/pintura_color/31.jpg", "imagenes/trabajos/pintura_color/32.jpg", 
    "imagenes/trabajos/pintura_color/33.jpg", "imagenes/trabajos/pintura_color/34.jpg", 
    "imagenes/trabajos/pintura_color/35.jpg", "imagenes/trabajos/pintura_color/36.jpg", 
    "imagenes/trabajos/pintura_color/37.jpg", "imagenes/trabajos/pintura_color/38.jpg", 
    "imagenes/trabajos/pintura_color/39.jpg", "imagenes/trabajos/pintura_color/40.jpg",
    "imagenes/trabajos/pintura_color/41.jpg", "imagenes/trabajos/pintura_color/42.jpg", 
    "imagenes/trabajos/pintura_color/43.jpg", "imagenes/trabajos/pintura_color/44.jpg", 
    "imagenes/trabajos/pintura_color/45.jpg", "imagenes/trabajos/pintura_color/46.jpg", 
    "imagenes/trabajos/pintura_color/47.jpg", "imagenes/trabajos/pintura_color/48.jpg", 
    "imagenes/trabajos/pintura_color/49.jpg", "imagenes/trabajos/pintura_color/50.jpg"]


btnSiguiente5.addEventListener("click", function() {
  indice5 = (indice5 + 1) % imagenes5.length;
  imagen5.src = imagenes5[indice5];
});

btnAnterior5.addEventListener("click", function() {
  indice5 = (indice5 - 1 + imagenes5.length) % imagenes5.length;
  imagen5.src = imagenes5[indice5];
});

});
