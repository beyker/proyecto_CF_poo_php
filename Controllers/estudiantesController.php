<?php namespace Controllers;

use Models\Estudiante as Estudiante;
use Models\Seccion as Seccion;
/**
 * estudiantesController
 */
class estudiantesController 
{
	//atributos
	private $estudiante;
	private $seccion;

	//metodos
	public function __construct()
	{
		$this->estudiante = new Estudiante();
		$this->seccion = new Seccion();
	}
	
	Public function index()
	{
		$datos = $this->estudiante->listar();
		return $datos;
	}


	public function agregar()
	{
		if(!$_POST){
			$datos = $this->seccion->listar();
			return $datos;
		}else{
			$permitidos=array("image/png","imagen/jpeg","imagen/gif","imagen/jpg");
			$limite=700;
				if(in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024){
					$nombre = date('i-s').$_FILES['imagen']['name'];
					$ruta = "Views/template/imagenes/avatars/".$nombre;
					move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);
					$this->estudiante->set("nombre", $_POST['nombre']);
					$this->estudiante->set("edad", $_POST['edad']);
					$this->estudiante->set("promedio", $_POST['promedio']);
					$this->estudiante->set("imagen", $nombre);
					$this->estudiante->set("id_seccion", $_POST['id_seccion']);
					$this->estudiante->add();
					header("Location: ". URL ."estudiantes");
				}
		}
	}

	public function editar($id)
	{
		if(!$_POST){
					$this->estudiante->set("id", $id);
					$datos=$this->estudiante->view();
					return $datos;
		}else{
					$this->estudiante->set("id", $_POST['id']);
					$this->estudiante->set("nombre", $_POST['nombre']);
					$this->estudiante->set("edad", $_POST['edad']);
					$this->estudiante->set("promedio", $_POST['promedio']);
					$this->estudiante->set("id_seccion", $_POST['id_seccion']);
					$this->estudiante->edit();
					header("Location: ". URL ."estudiantes");
			}
	}

	public function listarSecciones()
	{
		$datos=$this->seccion->listar();
		return $datos;
	}

	public function ver($id)
	{
		$this->estudiante->set("id", $id);
		$datos=$this->estudiante->view();
		return $datos;
	}

	public function eliminar($id)
	{
		$this->estudiante->set("id", $id);
		$datos=$this->estudiante->delete();
		header("Location: ". URL ."estudiantes");
	}

}

$estudiantes = new estudiantesController();

?>