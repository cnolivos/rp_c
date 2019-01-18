<?php

class MovimientosInvController extends ControladorBase{

	public function __construct() {
		parent::__construct();
	}



	public function index(){
	
		//Creamos el objeto usuario
	    $movimientos_productos_cabeza = new MovimientosProductosCabezaModel();
					//Conseguimos todos los usuarios
	    $resultSet=$movimientos_productos_cabeza->getAll("id_movimientos_productos_cabeza");
				
		$resultEdit = "";

		
		session_start();

	
		if (isset(  $_SESSION['nombre_usuarios']) )
		{

			$nombre_controladores = "MovimientosProductosCabeza";
			$id_rol= $_SESSION['id_rol'];
			$resultPer = $movimientos_productos_cabeza->getPermisosVer("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
			
			if (!empty($resultPer))
			{
				if (isset ($_GET["id_movimientos_productos_cabeza"])   )
				{

					$nombre_controladores = "MovimientosProductosCabeza";
					$id_rol= $_SESSION['id_rol'];
					$resultPer = $movimientos_productos_cabeza->getPermisosEditar("   controladores.nombre_controladores = '$nombre_controladores' AND permisos_rol.id_rol = '$id_rol' " );
						
					if (!empty($resultPer))
					{
					
					 

					}
					else
					{
						$this->view("Error",array(
								"resultado"=>"No tiene Permisos de Editar Movimientos Productos Cabeza"
					
						));
					
					
					}
					
				}
		
				
				$this->view("Compras",array(
						
			
				));
		
				
				
			}
			else
			{
				$this->view("Error",array(
						"resultado"=>"No tiene Permisos de Acceso a Movimientos Productos Cabeza"
				
				));
				
				exit();	
			}
				
		}
	else{
       	
       	$this->redirect("Usuarios","sesion_caducada");
       	
       }
	
	}
	
	
	
	
}
?>