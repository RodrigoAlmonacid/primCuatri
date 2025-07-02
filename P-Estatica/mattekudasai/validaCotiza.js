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

        var baseMano=3100;
        var valorManoObra=0;
        var pintBarniz=1;
        var pintLatex=1
        var pintSintetico=1;
    function manoObra(obra){
        

        if(lugar.value=='ext'){
            baseMano=baseMano*1.3;
        }
        if(estado.value=='pint'){
            let color=document.getElementById("color");
            if((tipoPint.value=='latex' || tipoPint.value=='sintetico') && color.value=='color'){
                baseMano=baseMano*1.2;
                pintLatex=pintLatex*1.7;
                pintSintetico=pintSintetico*1.7;
            }
        }
        else if(estado.value=='noPint'){
            let nueva=document.getElementById("nueva");
            if(nueva.value=='si'){
                baseMano=baseMano*1.4;
                pintLatex=pintLatex*1.9;
                pintSintetico=pintSintetico*1.9;
            }
            else if(nueva.value=='no'){
                baseMano=baseMano*1.2;
                pintLatex=pintLatex*1.8;
                pintSintetico=pintSintetico*1.8;
            }
        }
        valorManoObra=baseMano*obra;
        let cantidadPintura = calculaPintura(pintBarniz, pintLatex, pintSintetico);
        let arreglo=[valorManoObra, cantidadPintura];
        return arreglo;
    }

    function calculaPintura(a, b, c){
        let pinturalatex=b*calcularPared()/8;
        let pintSintetico=c*calcularPared()/12;
        let pintBarniz=a*calcularPared()/10;
        return pinturalatex;
    }



    function calculaArea(base, altura){

        let area=base*altura;
        return area;
    }

    function calcularPared(){
        let base=document.getElementById("base");
        base=Number(base.value);
        let altura=document.getElementById("altura");
        altura=Number(altura.value);
        let pared=calculaArea(base,altura);
        if(abertura.value=='si'){
            let baseAbertura=document.getElementById("baseAbert");
            baseAbertura=Number(baseAbertura.value);
            let alturaAbertura=document.getElementById("alturaAbert");
            alturaAbertura=Number(alturaAbertura.value);
            pared= pared-calculaArea(baseAbertura, alturaAbertura);
        }
        return pared;
    }
    
    form.addEventListener("submit", function(event) {
    event.preventDefault();
    let resultado=document.getElementById("resultado");
    resultado.innerHTML='<h2>Resultado:<h2><br><h3>Mano de obra:<h3>'+manoObra(calcularPared())[0]+'<h3>cantidad de pintura:<h3>'+manoObra(calcularPared())[1];
    baseMano=3100;
    valorManoObra=0;
    pintBarniz=1;
    pintLatex=1
    pintSintetico=1;
})
});



