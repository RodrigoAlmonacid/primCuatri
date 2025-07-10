
    const color1 = document.getElementById('color1');
    const color2 = document.getElementById('color2');
    const hex1 = document.getElementById('hex1');
    const hex2 = document.getElementById('hex2');
    const box1 = document.getElementById('box1');
    const box2 = document.getElementById('box2');
    const combinacion = document.getElementById('combinacion');

    function actualizarColores() {
      const c1 = color1.value;
      const c2 = color2.value;

      hex1.textContent = c1;
      hex2.textContent = c2;
      box1.style.backgroundColor = c1;
      box2.style.backgroundColor = c2;

      // Vista combinada como degradado
      combinacion.style.background = `linear-gradient(to right, ${c1}, ${c2})`;
    }

    color1.addEventListener('input', actualizarColores);
    color2.addEventListener('input', actualizarColores);

    