document.addEventListener("DOMContentLoaded", function() {
    let puntualidad=document.querySelectorAll('input[class="puntualidad"]');
    let prolijidad=document.querySelectorAll('input[class="prolijidad"]');
    let rapidez=document.querySelectorAll('input[class="rapidez"]');
    let calidad=document.querySelectorAll('input[class="calidad"]');
    let campoSatisfaccion=document.getElementById("campoSatisfaccion");
    let campoMejoraProl=document.getElementById("campoMejoraProl");
    let campoMejoraRap=document.getElementById("campoMejoraRap");
    let campoMejoraCal=document.getElementById("campoMejoraCal");
    let form=document.getElementById("formularioValoracion");
    let noPuntual=document.getElementById("comPunt");
    let noRapido=document.getElementById("comRap");
    let noCalidad=document.getElementById("comCal");
    let noProlijo=document.getElementById("comProl");
    let valorProlijidad = 0;
    let valorRapidez = 0;
    let valorCalidad = 0;
    let valorPuntualidad=0;
    
    
    puntualidad.forEach(estrella => {
        estrella.addEventListener("change", function() {
            valorPuntualidad = parseInt(estrella.value);
            noPuntual.innerHTML='Comentario:';
            noPuntual.style.color="black";
      });
    });
    
    prolijidad.forEach(estrella => {
        estrella.addEventListener("change", function() {
            valorProlijidad = parseInt(estrella.value);
            noProlijo.innerHTML='Comentario:';
            noProlijo.style.color="black";
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
            noRapido.innerHTML='Comentario:';
            noRapido.style.color="black";
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
            noCalidad.innerHTML='Calidad:';
            noCalidad.style.color="black";
            if(valorCalidad<=2){
                campoMejoraCal.style.display="block";
            }
            else{
                campoMejoraCal.style.display="none";
            }
            satisfaccion();
        }
    );
    });

    function sacarPromedioSatisfacion(){
        let promedio = (valorProlijidad + valorRapidez + valorCalidad + valorPuntualidad)/4;
        return promedio;
     }

    function satisfaccion(){
        campoSatisfaccion.style.display="block";
        var valor=sacarPromedioSatisfacion();
        var text=document.getElementById("satis");
        text.innerHTML='Su valoración: '+valor+' ⭐';
    }

form.addEventListener("submit", function(event) {
    const seleccionPuntualidad = document.querySelector('input[name="estPunt"]:checked');
    const seleccionProlijidad = document.querySelector('input[name="estProl"]:checked');
    const seleccionRapidez = document.querySelector('input[name="estRap"]:checked');
    const seleccionCalidad = document.querySelector('input[name="estCal"]:checked');

    if (!seleccionPuntualidad || !seleccionProlijidad || !seleccionRapidez || !seleccionCalidad) {
        event.preventDefault(); // evitar recarga
        if(!seleccionPuntualidad){
            noPuntual.innerHTML='Comentario: Por favor elige una opción.';
            noPuntual.style.color="red";
        }
        if(!seleccionProlijidad){
            noProlijo.innerHTML='Comentario: Por favor elige una opción.';
            noProlijo.style.color="red";
        }
        if(!seleccionRapidez){
            noRapido.innerHTML='Comentario: Por favor elige una opción.';
            noRapido.style.color="red";
        }
        if(!seleccionCalidad){
            noCalidad.innerHTML='Comentario: Por favor elige una opción.';
            noCalidad.style.color="red";
        }
    }
});
});
