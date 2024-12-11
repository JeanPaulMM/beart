<?php
       
    class ConexionMySQL {
        private $host = "localhost";
        private $usuario = "root";
        private $contrasena = "";
        private $base_datos = "beart";
        protected $conexion;

        public function __construct() {
            $this->conexion = new mysqli($this->host, $this->usuario, $this->contrasena, $this->base_datos);

            if ($this->conexion->connect_error) {
                die("Error de conexión: " . $this->conexion->connect_error);
            }
        }

        public function getConexion() {
            return $this->conexion;
        }

        public function cerrarConexion() {
            $this->conexion->close();
        }
    }
?>