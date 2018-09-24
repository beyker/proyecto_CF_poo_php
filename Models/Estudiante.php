<?php namespace Models;

ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Estudiante
 */
class Estudiante
{

	//atributos
	private $id;
	private $nombre;
	private $edad;
	private $promedio;
	private $imagen;
	private $id_seccion;
	private $fecha;
	private $con;

	//metodos
	function __construct()
	{
		$this->con= new Conexion();
	}

	public function set($atributo, $contenido){
		
		 $this->$atributo=$contenido;
	}

	public function get($atributo){
		
		 $this->atributo;
	}

	
	public function listar(){
			$sql = "SELECT t1.*, t2.nombre as nombre_seccion FROM estudiantes t1 INNER JOIN secciones t2 ON t1.id_seccion = t2.id ORDER BY id DESC";
			$datos = $this->con->consultaRetorno($sql);
			return $datos;
		}


		public function add(){
			$sql = "INSERT INTO estudiantes (id, nombre, edad, promedio, imagen, id_seccion, fecha)
					VALUES (null, '{$this->nombre}', '{$this->edad}', '{$this->promedio}', '{$this->imagen}',
					'{$this->id_seccion}', '2108-03-03')";

			//print $this->nombre.','.$this->edad.', '.$this->promedio.', '.$this->imagen.','.$this->id_seccion;die();
			$this->con->consultaSimple($sql);
		}

	public function delete()
	{
	$sql="DELETE FROM estudiantes WHERE id='{$this->id}'";
	$this->con->consultaSimple($sql);

	}


	public function edit()
	{
		$sql="UPDATE  estudiantes SET nombre='{$this->nombre}', edad='{$this->edad}', promedio='{$this->promedio}', id_seccion='{$this->id_seccion}' WHERE id='{$this->id}'";
		$this->con->consultaSimple($sql);

	}

	public function view()
	{

		$sql="SELECT t1.*, t2.nombre as nombre_seccion FROM estudiantes as t1 INNER JOIN secciones t2 ON t1.id_seccion=t2.id  WHERE t1.id='{$this->id}'";
		$datos = $this->con->consultaRetorno($sql);
		$row=mysqli_fetch_assoc($datos);
		return $row;

	}



}



?>