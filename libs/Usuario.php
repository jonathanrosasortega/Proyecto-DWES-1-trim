<?php
	class Usuario {
		private $idUsu ;
		private $email ;
		private $nombre ;
		private $apellidos ;
		private $permisos ;


		/**
		 */
		public function __construct() { }

	    /**
	     * @return mixed
	     */
	    public function getIdUsu()
	    {
	        return $this->idUsu;
	    }

	    /**
	     * @param mixed $idUsu
	     *
	     * @return self
	     */
	    public function setIdUsu($idUsu)
	    {
	        $this->idUsu = $idUsu;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getEmail()
	    {
	        return $this->email;
	    }

	    /**
	     * @param mixed $email
	     *
	     * @return self
	     */
	    public function setEmail($email)
	    {
	        $this->email = $email;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getNombre()
	    {
	        return $this->nombre;
	    }

	    /**
	     * @param mixed $nombre
	     *
	     * @return self
	     */
	    public function setNombre($nombre)
	    {
	        $this->nombre = $nombre;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getApellidos()
	    {
	        return $this->apellidos;
	    }

	    /**
	     * @param mixed $apellidos
	     *
	     * @return self
	     */
	    public function setApellidos($apellidos)
	    {
	        $this->apellidos = $apellidos;

	        return $this;
	    }

	    /**
	     * @return mixed
	     */
	    public function getPermisos()
	    {
	        return $this->permisos;
	    }

	    /**
	     * @param mixed $permisos
	     *
	     * @return self
	     */
	    public function setPermisos($permisos)
	    {
	        $this->permisos = $permisos;

	        return $this;
	    }

	    /**
	     */
	    public function __toString()
	    {
	    	return $this->nombre." ".$this->apellidos ;
	    }
	}	