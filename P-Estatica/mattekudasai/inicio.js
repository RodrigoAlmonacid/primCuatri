document.addEventListener("DOMContentLoaded", function(){
    const color1=document.getElementById('color1');
    const color2=document.getElementById('color2');
    const hex1=document.getElementById('hex1');
    const hex2=document.getElementById('hex2');
    const divComb=document.getElementById('divPaleta');
    const fondo=document.body;
    let combinar=document.getElementById('combinar');//combinar es el id del input
    let limpiar=document.getElementById('limpiar');//limpiar es el id del input


    function actualizarColores() {
      const colorDiv = color1.value;
      const colorFondo = color2.value;
      hex1.textContent = colorDiv;
      hex2.textContent = colorFondo;
      divComb.style.backgroundColor = colorDiv;
      fondo.style.backgroundColor = colorFondo;
    }

    function limpiarColores() {
      divComb.style.backgroundColor = "#e8f6ff";
      fondo.style.backgroundColor = "#7fffd4";
    }

    combinar.addEventListener('click', actualizarColores);
    limpiar.addEventListener('click', limpiarColores);
});


     