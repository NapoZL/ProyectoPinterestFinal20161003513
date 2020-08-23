<?php
    class Usuario{
        private $codigoUsuario;
        private $nombre;
        private $apellido;
        private $correo;
        private $contrasena;
        private $genero;
        private $siguiendo;

        public function __construct($codigoUsuario,$nombre,$apellido,$correo,$contrasena,$genero,$siguiendo){
                $this->codigoUsuario = $codigoUsuario;
                $this->nombre = $nombre;
                $this->apellido = $apellido;
                $this->correo = $correo;
                $this->contrasena = $contrasena;
                $this->genero = $genero;
                $this->siguiendo = $siguiendo;
        }

        public static function obtenerUsuarios(){
            $contenidoArchivo = file_get_contents('../data/usuarios.json');
            echo $contenidoArchivo;
        }

        public static function obtenerUsuario(){

        }

        public static function validarUsuario($correo, $contrasena){
                $contenidoArchivoUsuarios = file_get_contents("../data/usuarios.json");
                $usuarios = json_decode($contenidoArchivoUsuarios, true);
                for ($i=0; $i <sizeof($usuarios) ; $i++) { 
                        if($usuarios[$i]["correo"] == $correo && $usuarios[$i]["contrasena"] == sha1($contrasena)){
                                return $usuarios[$i];
                        }
                }
                return null;
        }

        /**
         * Get the value of codigoUsuario
         */ 
        public function getCodigoUsuario()
        {
                return $this->codigoUsuario;
        }

        /**
         * Set the value of codigoUsuario
         *
         * @return  self
         */ 
        public function setCodigoUsuario($codigoUsuario)
        {
                $this->codigoUsuario = $codigoUsuario;

                return $this;
        }

        /**
         * Get the value of nombre
         */ 
        public function getNombre()
        {
                return $this->nombre;
        }

        /**
         * Set the value of nombre
         *
         * @return  self
         */ 
        public function setNombre($nombre)
        {
                $this->nombre = $nombre;

                return $this;
        }

        /**
         * Get the value of apellido
         */ 
        public function getApellido()
        {
                return $this->apellido;
        }

        /**
         * Set the value of apellido
         *
         * @return  self
         */ 
        public function setApellido($apellido)
        {
                $this->apellido = $apellido;

                return $this;
        }

        /**
         * Get the value of correo
         */ 
        public function getCorreo()
        {
                return $this->correo;
        }

        /**
         * Set the value of correo
         *
         * @return  self
         */ 
        public function setCorreo($correo)
        {
                $this->correo = $correo;

                return $this;
        }

        /**
         * Get the value of contrasena
         */ 
        public function getContrasena()
        {
                return $this->contrasena;
        }

        /**
         * Set the value of contrasena
         *
         * @return  self
         */ 
        public function setContrasena($contrasena)
        {
                $this->contrasena = $contrasena;

                return $this;
        }

        /**
         * Get the value of genero
         */ 
        public function getGenero()
        {
                return $this->genero;
        }

        /**
         * Set the value of genero
         *
         * @return  self
         */ 
        public function setGenero($genero)
        {
                $this->genero = $genero;

                return $this;
        }

        /**
         * Get the value of siguiendo
         */ 
        public function getSiguiendo()
        {
                return $this->siguiendo;
        }

        /**
         * Set the value of siguiendo
         *
         * @return  self
         */ 
        public function setSiguiendo($siguiendo)
        {
                $this->siguiendo = $siguiendo;

                return $this;
        }
    }
?>