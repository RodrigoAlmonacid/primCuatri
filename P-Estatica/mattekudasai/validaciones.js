document.addEventListener("DOMContentLoaded", function() {
    var puntualidad=document.querySelectorAll('input[class="puntualidad"]');
    var prolijidad=document.querySelectorAll('input[class="prolijidad"]');
    var rapidez=document.querySelectorAll('input[class="rapidez"]');
    var calidad=document.querySelectorAll('input[class="calidad"]');
    var satisfaccion=document.getElementById("campoSatisfaccion");
    var campoMejoraProl=document.getElementById("campoMejoraProl");
    var campoMejoraRap=document.getElementById("campoMejoraRap");
    var campoMejoraCal=document.getElementById("campoMejoraCal");
    var form=document.getElementById("formularioValoracion");

    prolijidad.forEach(estrella => {
        estrella.addEventListener("change", function() {
            var valor = parseInt(estrella.value);
            if(valor <= 2){
                campoMejoraProl.style.display = "block";
            } 
            else{
                campoMejoraProl.style.display = "none";
            }
      });
  
    rapidez.forEach(estrella => {
        estrella.addEventListener("change", function(){
            var valor=parseInt(estrella.value);
            if(valor<=2){
                campoMejoraRap.style.display="block";
            }
            else{
                campoMejoraRap.style.display="none";
            }
        })
    });

    calidad.forEach(estrella=>{
        estrella.addEventListener("change", function(){
            var valor=parseInt(estrella.value);
            if(valor<=2){
                campoMejoraCal.style.display="block";
            }
            else{
                campoMejoraCal.style.display="none";
            }
        });
    });

    var promedio=parseInt(puntualidad.value)+parseInt(prolijidad.value)+parseInt(rapidez.value)+parseInt(calidad.value);
    promedio=promedio/4;
    if(promedio>0){
        satisfaccion.style.display="block";
        var text=document.getElementById("satisfaccion");
        text.innerHTML='Su valoración: '+promedio;
    } 
});
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
});
