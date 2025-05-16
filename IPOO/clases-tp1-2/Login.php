<?php
/*10.d. Implementar una clase Login que almacene el nombreUsuario, contraseña, frase que permite
recordar la contraseña ingresada y las ultimas 4 contraseñas utilizadas. Implementar un método que
permita validar una contraseña con la almacenada y un método para cambiar la contraseña actual por otra
nueva, el sistema deja cambiar la contraseña siempre y cuando esta no haya sido usada recientemente (es
decir no se encuentra dentro de las cuatro almacenadas). Implementar el método recordar que dado el
usuario, muestra la frase que permite recordar su contraseña.*/

class Login {
    //Variables instancia
    private $nombreUsuario;
    private $contrasena;
    private $frase;
    private $almacenaContra = [];

    //Metodos
    public function __construct($usuario, $contrasena, $frase)
    {
        $this -> nombreUsuario = $usuario;
        $this -> contrasena = $contrasena;
        $this -> frase = $frase;
        $this -> almacenaContra = $this -> almacenaContraFrase();
    }

    public function getNombreUsuario (){
        return $this -> nombreUsuario;
    }
    public function setNombreUsuario($usuario){
        $this -> nombreUsuario = $usuario;
    }

    public function getContrasena (){
        return $this -> contrasena;
    }
    public function setContrasena ($contrasena){
        $this -> contrasena = $contrasena;
    }

    public function getFrase (){
        return $this -> frase;
    }
    public function setFrase ($frase){
        $this -> frase = $frase;
    }

    public function contraFraseActual (){
        //funcion que arma un arreglo con los datos de usuario actual
        $contraActual = [$this -> getContrasena(), $this -> getFrase()];
        return $contraActual;
    }

    public function almacenaContraFrase (){
        array_push($almacenaContra, $this -> contraFraseActual());
        if (count($almacenaContra) > 4){
            array_shift($almacenaContra);
        }
        return $almacenaContra;
    }

    /** funcion que valida la contraseña
     * @param STRING $contrasena
     * @return BOOL
     * */
    public function validaContra($contrasena){
        if ($contrasena == $this -> getContrasena()){
            $valida = TRUE;
        }
        else
            $valida = FALSE;
        return $valida;
    }

    /** funcion que recibe una contraseña y se fija si fue alguna de las ultimas 4 usadas
     * @param STRING $contraseña
     * @return BOOL
     */
    public function contraUsada ($contrasena){
        //variables:
        //INT $filas (cantidad de filas del arreglo que lmacena contraseñas)
        //    $i variable iteradora
        //BOOL $existe (devuelve veradero o falso dependiendo si fue o no usada la contraseña)
        $filas = count($this -> almacenaContraFrase());
        $i = 0;
        $existe = FALSE;
        do {
            if ($this -> almacenaContraFrase()[$i][0] == $contrasena){
                $existe = TRUE;
            }
            $i++;
        }while (!$existe && $i < $filas);
        return $existe;   
    }

    /** funcion que me permite cambiar de contraseña y frase 
     * @param STRING $contrasena (es la nueva contraseña a utilizar)
     * @param STRING $frase (nueva frase que permite recordar la contraseña)
     * @return STRING
     */
    public function cambioContraFrase($contrasena, $frase){
        if ($this -> contraUsada($contrasena)){
            $posible = "Ya usó esta contraseña, por favor ingrese una distinta a las últimas 4 utilizadas.\n";
        }
        else{
            $this -> setContrasena($contrasena);
            $this -> setFrase($frase);
            $posible = "Contraseña y frase modificada con éxito.\n";
        }
        return $posible;
    }

    public function __toString()
    {
        return $this ->cambioContraFrase("Rata", "aaaaa");
    }
    /** función que me muestra la frase que me permite recordar la última contraseña
     * @param 
     */
}
?>