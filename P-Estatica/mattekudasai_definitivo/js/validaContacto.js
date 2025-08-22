document.addEventListener('DOMContentLoaded', function(){
    $.datepicker.setDefaults({
        dateFormat: "dd/mm/yy",
        monthNames: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                     "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
        dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"]
    });

    $("#fechaHora").datetimepicker({
        showOn: "button",
        buttonImage: "icono-calendario.png",
        buttonImageOnly: true,
        buttonText: "Seleccionar fecha y hora",
        timeFormat: "HH:mm",
        controlType: "select"
    });
    function validaNombre()
    {
        let nom=document.getElementById("nombre");
        let regla=/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/;//regla especifica de los valores que quiero aceptar. solo letras con o sin tildes y espacios
        let verificaNom=regla.test(nom.value.trim());
        let nombre=false;
        if(verificaNom && nom.value.trim()!=""){
            nombre=true;
            nom.style.border="2px solid green";
        }
        else if(nom.value.trim()==""){
            nom.setAttribute("required", "");
            nom.style.border="2px solid red";
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
        if(verificaApell && apell.value.trim()!=""){
            apellido=true;
            apell.style.border="2px solid green";
        }
        else if(apell.value.trim()==""){
            apell.setAttribute("required", "");
            apell.style.border="2px solid red";
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
        else if(telefono.value.trim()==""){
            telefono.setAttribute("required", "");
            telefono.style.border="2px solid red";
        }
        else{
            telefono.style.border="2px solid red";
        }
        return validaTel;
    }

    function validaForm(){
        let validaTodo=false;
    if(validaNombre() && validaApellido() && validaTel()){
        validaTodo=true;
    }
    return validaTodo;
    }

    let form=document.getElementById('formularioVisita');
    form.addEventListener('submit', function(event) {
        let nom=document.getElementById("nombre");
        let apell=document.getElementById("apellido");
        let telefono=document.getElementById("telefono");

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
});
