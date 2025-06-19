<?php
class BaseDatos {
    private $HOSTNAME;
    private $BASEDATOS;
    private $USUARIO;
    private $CLAVE;
    private $CONEXION;
    private $QUERY;
    private $RESULT;
    private $ERROR;

    public function __construct() {
        $this->HOSTNAME = "localhost";
        $this->BASEDATOS = "bdviajes";
        $this->USUARIO = "phpmyadmin";
        $this->CLAVE = "Patagonia1291";
        $this->RESULT = null;
        $this->QUERY = "";
        $this->ERROR = "";
    }

    // Métodos de acceso
    public function getHostname() {
        return $this->HOSTNAME;
    }
    public function setHostname($host) {
        $this->HOSTNAME = $host;
    }

    public function getBaseDatos() {
        return $this->BASEDATOS;
    }
    public function setBaseDatos($base) {
        $this->BASEDATOS = $base;
    }

    public function getUsuario() {
        return $this->USUARIO;
    }
    public function setUsuario($usuario) {
        $this->USUARIO = $usuario;
    }

    public function getClave() {
        return $this->CLAVE;
    }
    public function setClave($clave) {
        $this->CLAVE = $clave;
    }

    public function getResult() {
        return $this->RESULT;
    }
    public function setResult($result) {
        $this->RESULT = $result;
    }

    public function getQuery() {
        return $this->QUERY;
    }
    public function setQuery($query) {
        $this->QUERY = $query;
    }

    public function getError() {
        return $this->ERROR;
    }
    public function setError($error) {
        $this->ERROR = $error;
    }

    /**
     * Inicia la conexión con el servidor y la base de datos MySQL.
     * @return bool
     */
    public function Iniciar() {
        $resp = false;
        $conexion = mysqli_connect(
            $this->getHostname(),
            $this->getUsuario(),
            $this->getClave(),
            $this->getBaseDatos()
        );

        if ($conexion) {
            $this->CONEXION = $conexion;
            $this->setQuery(null);
            $this->setError(null);
            $resp = true;
        } else {
            $this->setError(mysqli_connect_errno() . ": " . mysqli_connect_error());
        }

        return $resp;
    }

    /**
     * Ejecuta una consulta en la base de datos.
     * @param string $consulta
     * @return bool
     */
    public function Ejecutar($consulta) {
        $this->setError(null);
        $this->setQuery($consulta);

        $result = mysqli_query($this->CONEXION, $consulta);
        $this->setResult($result);

        if ($result) {
            return true;
        } else {
            $this->setError(mysqli_errno($this->CONEXION) . ": " . mysqli_error($this->CONEXION));
            return false;
        }
    }

    /**
     * Devuelve un registro como array asociativo o null si no hay más resultados.
     * @return array|null
     */
    public function Registro() {
        $resp = null;
        $this->setError(null);

        if ($this->getResult() instanceof mysqli_result) {
            $registro = mysqli_fetch_assoc($this->getResult());
            if ($registro) {
                $resp = $registro;
            } else {
                mysqli_free_result($this->getResult());
                $this->setResult(null);
            }
        } else {
            $this->setError(mysqli_errno($this->CONEXION) . ": " . mysqli_error($this->CONEXION));
        }

        return $resp;
    }

    /**
     * Devuelve el ID de una inserción con campo autoincremental.
     * @param string $consulta
     * @return int|null
     */
    public function devuelveIDInsercion($consulta) {
        $this->setError(null);
        $this->setQuery($consulta);

        $result = mysqli_query($this->CONEXION, $consulta);
        $this->setResult($result);

        if ($result) {
            return mysqli_insert_id($this->CONEXION);
        } else {
            $this->setError(mysqli_errno($this->CONEXION) . ": " . mysqli_error($this->CONEXION));
            return null;
        }
    }
}
  

?>