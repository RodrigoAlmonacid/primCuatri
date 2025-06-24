function validaFecha()
{
    //tomo los input dia, ,es y año, cada uno en una variable
    let dia=document.getElementById("dia");
    let mes=document.getElementById("mes");
    let anio=document.getElementById("anio");
    let fecha=false;//variable de retorno
    invalid=false;
    if(dia.value.trim()=="" || !Number.isInteger(Number(dia.value)) || (Number.isInteger(Number(dia.value)) && Number(dia.value)<1)){
        /*Ingreso al if solo si: (lo mismo para el mes y el año)
        - el valor en el input dia sin espacios es vacío
        - el valor en el input dia no es un entero
        - el valor en el input dia es un entero menor a 1
        en cualquiera de los casos colorea de rojo el borde del input*/
        dia.style.border="2px solid red";
        invalid=true;
        if(dia.value.trim()==""){
            //Si el campo es vacío o solo tuene espacios
            dia.placeholder="Requerido";
            dia.setAttribute("required", "");
        }
    }
    if(mes.value.trim()=="" || !Number.isInteger(Number(mes.value)) || (Number.isInteger(Number(mes.value)) && Number(mes.value)<1)){
        mes.style.border="2px solid red";
        invalid=true;
        if(mes.value.trim()==""){
            mes.placeholder="Requerido";
            mes.setAttribute("required", "");
        }
    }
    if(anio.value.trim()=="" || !Number.isInteger(Number(anio.value)) || (Number.isInteger(Number(anio.value)) && Number(anio.value)<1)){
        anio.style.border="2px solid red";
        invalid=true;
        if(anio.value.trim()==""){
            anio.placeholder="Requerido";
            anio.setAttribute("required", "");
        }
    }
    if(!invalid && mes.value<13){
        if(mes.value==2){ 
            //voy a hacer la cuenta del año bisiesto solamente si se ingresa febrero    
            if(anio.value % 400 == 0 || (anio.value % 4 == 0 && anio.value % 100 != 0)){
                //como el año es bisiesto, le pido que el mes tenga 29 días
                if(dia.value<30){
                    fecha=true;
                }
                else{
                    dia.style.border="2px solid red";
                }
            }
            else{
                //como el año no es biciesto, febrero tiene 28 dias
                if(dia.value<29){
                    fecha=true;
                }
                else{
                    dia.style.border="2px solid red";
                }
            }
        }
        //ingreso con los meses que tienen 30 dias
        else if(mes.value==4 || mes.value==6 || mes.value==9 || mes.value==11){
            if(dia.value<31){
                fecha=true;
            }
            else{
                dia.style.border="2px solid red";
            }
        }
        else {
            //los meses restantes tienen 31 dias    
            if(dia.value<32){
                fecha=true;
            }
            else{
                dia.style.border="2px solid red";
            }
        }
    }
    else{
        mes.style.border="2px solid red";
    }
    if(fecha){
        dia.style.border="2px solid green";
        mes.style.border="2px solid green";
        anio.style.border="2px solid green";
    }    
    return fecha;
}

function enteroRango(numero, max){
        numeroEntero=Number.isInteger(Number(numero));
        verifica=false;
        if(numeroEntero && numero<=max && numero>=0 && numero!=""){
          verifica=true;
        }
        return verifica;
      }

function validaHora(){
    let hora=document.getElementById("hora");
    let minuto=document.getElementById("minuto");
    let validaHora=false;    
    if(enteroRango(hora, 23) && enteroRango(minuto, 59)){
        validaHora=true;
    }
    return validaHora;
}

function validaForm(){
    if(validaFecha()&&validaHora){
        alert('agendado');
    }
    else{alert('algo salió mal')}
}