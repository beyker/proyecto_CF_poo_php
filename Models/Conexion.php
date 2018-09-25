<?php namespace Models;

ini_set('display_errors', 1);
error_reporting(E_ALL);

		/**
		 * Conexion
		 */
		class Conexion
		{
			
			//atributos
			private $datos= array(
			"host"=>"localhost",
			"user"=>"root",
			"pass"=>"123456",
			"db"=>"proyecto"
			);
			private $con;

			//metodos
			function __construct()
			{
				$this->con = new \mysqli(
					$this->datos['host'],
					$this->datos['user'],
					$this->datos['pass'],
					$this->datos['db']);
			}

			public function consultaSimple($sql)
			{
				$this->con->query($sql);
			}

			public function consultaRetorno($sql)
			{
				$datos=$this->con->query($sql);
				return $datos;
			}

		}

?>