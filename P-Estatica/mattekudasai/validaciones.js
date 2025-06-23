document.addEventListener("DOMContentLoaded", function() {
    let puntualidad=document.querySelectorAll('input[class="puntuaidad"]');
    let prolijidad=document.querySelectorAll('input[class="prolijidad"]');
    let rapidez=document.querySelectorAll('input[class="rapidez"]');
    let calidad=document.querySelectorAll('input[class="calidad"]');
    let campoSatisfaccion=document.getElementById("campoSatisfaccion");
    let campoMejoraProl=document.getElementById("campoMejoraProl");
    let campoMejoraRap=document.getElementById("campoMejoraRap");
    let campoMejoraCal=document.getElementById("campoMejoraCal");
    let form=document.getElementById("formularioValoracion");
    let valorProlijidad = 0;
    let valorRapidez = 0;
    let valorCalidad = 0;
    let valorPuntualidad=0;
    
    
    puntualidad.forEach(estrella => {
        estrella.addEventListener("change", function() {
            valorPuntualidad = parseInt(estrella.value);
      });
    });
    
    prolijidad.forEach(estrella => {
        estrella.addEventListener("change", function() {
            valorProlijidad = parseInt(estrella.value);
            if(valorProlijidad <= 2){
                campoMejoraProl.style.display = "block";
            } 
            else{
                campoMejoraProl.style.display = "none";
            }
      });
    });
  
    rapidez.forEach(estrella => {
        estrella.addEventListener("change", function(){
            valorRapidez=parseInt(estrella.value);
            if(valorRapidez<=2){
                campoMejoraRap.style.display="block";
            }
            else{
                campoMejoraRap.style.display="none";
            }
        });
    });

    calidad.forEach(estrella=>{
        estrella.addEventListener("change", function(){
            valorCalidad=parseInt(estrella.value);
            if(valorCalidad<=2){
                campoMejoraCal.style.display="block";
            }
            else{
                campoMejoraCal.style.display="none";
            }
        });
        satisfaccion();
    });

    function sacarPromedioSatisfacion(){
        let promedio = (valorProlijidad + valorRapidez + valorCalidad + valorPuntualidad)/4;
        return promedio;
     }

    function satisfaccion(){
        campoSatisfaccion.style.display="block";
        var valor=sacarPromedioSatisfacion();
        var text=document.getElementById("satis");
        text.innerHTML='Su valoración: '+valor;
    }

/*
form.addEventListener("submit", (e) => {
    e.preventDefault(); // evitar recarga

    const seleccionada = document.querySelector('input[name="estrella"]:checked');
    const comentarioTexto = comentario.value.trim();

    if (!seleccionada) {
        alert("Por favor, seleccioná una puntuación.");
    return;
    }

    if (comentarioTexto.length < 5) {
        alert("El comentario debe tener al menos 5 caracteres.");
        comentario.focus();
    return;
    }

    // Si está visible el campo de mejora, también validar
    if (campoMejora.style.display === "block") {
        const sugerencia = document.getElementById("mejora").value.trim();
        if (sugerencia === "") {
            alert("Por favor, contanos cómo podríamos mejorar.");
            document.getElementById("mejora").focus();
        return;
        }
    }

    alert("¡Gracias por tu valoración!");
    form.reset();
    campoMejora.style.display = "none";
    });
    */
});
