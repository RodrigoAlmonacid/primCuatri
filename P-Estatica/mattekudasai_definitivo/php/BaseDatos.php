<?php
class BaseDatos {
    private $hostName;
    private $baseDatos;
    private $usuario;
    private $clave;
    private $conexion;
    private $query;
    private $result;
    private $error;

    public function __construct() {
        $this->hostName = "localhost";
        $this->baseDatos = "mattekudasai";
        $this->usuario = "root";
        $this->clave = "";
        $this->result = null;
        $this->query = "";
        $this->error = "";
    }

    // Métodos de acceso
    public function getHostName() {
        return $this->hostName;
    }
    public function setHostName($host) {
        $this->hostName = $host;
    }

    public function getBaseDatos() {
        return $this->baseDatos;
    }
    public function setBaseDatos($base) {
        $this->baseDatos = $base;
    }

    public function getUsuario() {
        return $this->usuario;
    }
    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function getClave() {
        return $this->clave;
    }
    public function setClave($clave) {
        $this->clave = $clave;
    }

    public function getResult() {
        return $this->result;
    }
    public function setResult($result) {
        $this->result = $result;
    }

    public function getQuery() {
        return $this->query;
    }
    public function setQuery($query) {
        $this->query = $query;
    }

    public function getError() {
        return $this->error;
    }
    public function setError($error) {
        $this->error = $error;
    }

    /**
     * Inicia la conexión con el servidor y la base de datos MySQL.
     * @return bool
     */
    public function Iniciar() {
        $resp = false;
        //mysqli_report(MYSQLI_REPORT_OFF);
        $conexion = mysqli_connect(
            $this->getHostName(),
            $this->getUsuario(),
            $this->getClave(),
            $this->getBaseDatos()
        );
        if ($conexion) {
            $this->conexion = $conexion;
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
        $result = mysqli_query($this->conexion, $consulta);
        $this->setResult($result);
        $ejecuta=false;
        if ($result) {
            $ejecuta=true;
        } else {
            $this->setError(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion));
        }
        return $ejecuta;
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
            $this->setError(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion));
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

        $result = mysqli_query($this->conexion, $consulta);
        $this->setResult($result);

        if ($result) {
            return mysqli_insert_id($this->conexion);
        } else {
            $this->setError(mysqli_errno($this->conexion) . ": " . mysqli_error($this->conexion));
            return null;
        }
    }
    public function Cerrar(){
        mysqli_close($this->conexion);
    }
}
?>