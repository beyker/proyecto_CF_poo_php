<?php namespace Controllers;

use Models\Seccion as Seccion;
/**
 * seccionesController
 */
class seccionesController 
{

	private $secciones;

	public function __construct(){
		$this->secciones = new Seccion();
	}
	
	Public function index()
	{
		$datos = $this->secciones->listar();
		return $datos;
	}



	Public function agregar()
	{

		if($_POST){
			$this->secciones->set("nombre", $_POST['nombre']);
			$this->secciones->add();
			header("Location: ". URL ."secciones");
			}

		}




		public function editar($id)
	{

		
		if(!$_POST){
					$this->secciones->set("id", $id);
					$datos=$this->secciones->view();
					return $datos;
			}else{		
					$this->secciones->set("id", $_POST['id']);
					$this->secciones->set("nombre", $_POST['nombre']);
					$this->secciones->edit();
					header("Location: ". URL ."secciones");

			}
	}

	
	
	public function eliminar($id)
	{

		$this->secciones->set("id", $id);
		if($this->secciones->validar()  <= 0){
			$datos=$this->secciones->delete();
			header("Location: ". URL ."secciones");
			}else{
				echo '<script language="javascript">alert("Error no se puede eliminar esta seccion, tiene estudiantes asociados");</script>'; 


		}


	}

}

$secciones = new seccionesController();


?>