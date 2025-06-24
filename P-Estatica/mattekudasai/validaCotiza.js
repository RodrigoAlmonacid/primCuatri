document.addEventListener("DOMContentLoaded", function(){
    let lugar=document.getElementById("lugar");
    let material=document.getElementById("material");
    let estado=document.getElementById("estado");
    let tipoPint=document.getElementById("tipoPint");
    let abertura=document.getElementById("abertura");
    let form=document.getElementById("cotizador");

    estado.addEventListener("change", function(){
        let selecEstado=estado.value;
        let divPint=document.getElementById("selPintado");
        let divNoPint=document.getElementById("selNoPint");
        if(selecEstado=='pint'){
            divPint.style.display="block";
            divNoPint.style.display="none";
        }
        else if(selecEstado=='noPint'){
            divNoPint.style.display="block";
            divPint.style.display="none";
        }
        else{
            divPint.style.display="none";
            divNoPint.style.display="none";
        }
    })

    tipoPint.addEventListener("change", function(){
        let selecTipoPint=tipoPint.value;
        let divColor=document.getElementById("selColor");
        if(selecTipoPint=='latex' || selecTipoPint=='sintetico'){
            divColor.style.display="block";
        }
        else{
            divColor.style.display="none";
        }
    })

    abertura.addEventListener("change", function(){
        let selecAbertura=abertura.value;
        let divAbertura=document.getElementById("siAbertura");
        if(selecAbertura=='si'){
            divAbertura.style.display="block";
        }
        else{
            divAbertura.style.display="none";
        }
    })

    function calculaArea(base, altura){

        let area=base*altura;
        return area;
    }

    function calcularPared(){
        let base=document.getElementById("base");
        let altura=document.getElementById("altura");
        let baseAbertura=document.getElementById("baseAbert");
        let alturaAbertura=document.getElementById("alturaAbert");
        base=Number(base.value);
        baseAbertura=Number(baseAbertura.value);
        altura=Number(altura.value);
        alturaAbertura=Number(alturaAbertura.value);
        let pared=calculaArea(base,altura)-calculaArea(baseAbertura, alturaAbertura);
        return pared;
    }

    function calculaPintura(){
        let pintura=calcularPared()/7;
        return pintura;
    }
    
    form.addEventListener("submit", function(event) {
    event.preventDefault();
    let resultado=document.getElementById("resultado");
    resultado.innerHTML='<h2>Resultado:<h2><br><h3>Mano de obra:<h3>'+calcularPared()+'<h3>cantidad de pintura:<h3>'+calculaPintura();
})
});



