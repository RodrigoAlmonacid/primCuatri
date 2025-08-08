document.addEventListener('DOMContentLoaded', function(){
function validaFechaBis()
{
    //tomo los input dia, mes y año, cada uno en una variable
    let dia=document.getElementById("dia");
    let mes=document.getElementById("mes");
    let anio=document.getElementById("anio");
    let fecha=false;//variable de retorno
    let invalid=false;
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
    if(anio.value.trim()=="" || !Number.isInteger(Number(anio.value)) || (Number.isInteger(Number(anio.value)) && Number(anio.value)<2024)){
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

function validaFechaActual(){
    let dia=document.getElementById("dia");
    let mes=document.getElementById("mes");
    let anio=document.getElementById("anio");
    // Crear la fecha ingresada (mes en JS es 0-based (arranca en cero), por eso restamos 1)
    let fechaIngresada = new Date(anio.value, mes.value - 1, dia.value);
    // Crear la fecha de hoy sin hora
    let hoy = new Date();
    let fechaPost=false;
    hoy.setHours(0, 0, 0, 0); // borra la parte de la hora
    fechaIngresada.setHours(0, 0, 0, 0);
    if (fechaIngresada > hoy) {
        fechaPost=true;
    }
    else{
        alert("La fecha debe ser posterior a hoy.");
    }
    return fechaPost;
}

function validaFecha(){
    let fechaCorrecta=false;
    if(validaFechaActual() && validaFechaBis()){
        fechaCorrecta=true;
    }
    return fechaCorrecta;
}

function validaNombre()
{
    let nom=document.getElementById("nombre");
    let regla=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;//regla especifica de los valores que quiero aceptar. solo letras con o sin tildes y espacios
    let verificaNom=regla.test(nom.value.trim());
    let nombre=false;
    if(verificaNom){
        nombre=true;
        nom.style.border="2px solid green";
    }
    else{
        nom.style.border="2px solid red";
    }
    return nombre;
}

function validaApellido()
{
    let apell=document.getElementById("apellido");
    let apellido=false;
    let regla=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;
    let verificaApell=regla.test(apell.value.trim());
    if(verificaApell){
        apellido=true;
        apell.style.border="2px solid green";
    }
    else {
        apell.style.border="2px solid red";
    }
    return apellido;
}

function validaTel()
{
    let telefono=document.getElementById("telefono");
    let validaTel=false;
    let tel=Number.isInteger(Number(telefono.value));
    if(tel && telefono.value>1000000000){
        validaTel=true;
        telefono.style.border="2px solid green";
    }
    else{
        telefono.style.border="2px solid red";
    }
    return validaTel;
}

function enteroRango(numero, max){
        let numeroEntero=Number.isInteger(Number(numero));
        let verifica=false;
        if(numeroEntero && numero<=max && numero>=0 && numero!=""){
          verifica=true;
        }
        return verifica;
      }

function validaHora(){
    let hora=document.getElementById("hora");
    let minuto=document.getElementById("minuto");
    let validaHora=false;    
    if(enteroRango(hora.value, 23) && enteroRango(minuto.value, 59)){
        validaHora=true;
        hora.style.border="2px solid green";
        minuto.style.border="2px solid green";
    }
    else{
        hora.style.border="2px solid red";
        minuto.style.border="2px solid red";
    }
    return validaHora;
}

    function validaForm(){
        let validaTodo=false;
    if(validaFecha() && validaHora() && validaApellido() && validaNombre() && validaTel()){
        validaTodo=true;
    }
    return validaTodo;
}

let form=document.getElementById('formularioVisita');
form.addEventListener('submit', function(event) {
    let nom=document.getElementById("nombre");
    let apell=document.getElementById("apellido");
    let dia=document.getElementById("dia");
    let mes=document.getElementById("mes");
    let anio=document.getElementById("anio");
    let fechaIngresada = new Date(anio.value, mes.value - 1, dia.value);
    fechaIngresada.setHours(0, 0, 0, 0);
    let telefono=document.getElementById("telefono");
    let hora=document.getElementById("hora");

    // Evita que el formulario se envíe
    if(validaForm()){
        const unaVisita={
            nombreVisita: nom.value.trim(),
            apellidoVisita: apell.value.trim(),
            telefonoVisita: telefono.value.trim(),
            fechaVisita: fechaIngresada.toLocaleDateString("es-AR"),
            horaVisita: hora.value.trim()
        }
        let visitas=JSON.parse(localStorage.getItem("visitas")) || [];
        visitas.push(unaVisita);
        localStorage.setItem("visitas", JSON.stringify(visitas));
        form.reset();
        alert("Visita agendada correctamente.");
    }
    else{
        event.preventDefault();
    }
    });
function mostrarVisitas() {
    const contenedor = document.getElementById("listaVisitas");
    const visitas = JSON.parse(localStorage.getItem("visitas")) || [];

    if (visitas.length === 0) {
        contenedor.innerHTML = "<p>No hay visitas guardadas.</p>";
        return;
    }
    else{
        let numVisita=0;
        let texto="";
    visitas.forEach(unaVisita => {
        numVisita++;
        let nombre=unaVisita.nombreVisita;
        let apellido=unaVisita.apellidoVisita;
        let telefono=unaVisita.telefonoVisita;
        let fecha=unaVisita.fechaVisita;
        let hora=unaVisita.horaVisita;
        texto+="<h2>Visita N°: "+numVisita+"</h2><br>Apellido y Nombre: "+apellido+" "+nombre;
        texto+="<br>Teléfono de contacto: "+telefono+"<br>Fecha: "+fecha+"<br>Horario: "+hora+"<br>";
    });
    contenedor.innerHTML=texto;
    }
}
mostrarVisitas();
});
