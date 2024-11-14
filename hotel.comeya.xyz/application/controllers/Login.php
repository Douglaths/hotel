<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');
	}

	public function index()
	{
		$this->session->sess_destroy(); 
		$this->load->view('login');
	}

	public function verificar_usuario() {
		if(!$this->input->is_ajax_request()) {
			redirect();
		} else {
			$resu = $this->general_model->validar_usuario($this->input->post('usuario'));
			
			$datos = '';
			foreach ($resu as $row ) {
				if($row->estado == "1") {
					if($row->clave == $this->input->post('clave')) {		
						$id_usuario = $row->id_usuario;
						define('CON_id_usuario', $id_usuario);
						//$usuario = $row->usuario;
						$nombre_usuario = $row->nombre.' '.$row->apellido;
						$nom_usuario = $row->nombre;
						$perfil = $row->tipo_usuario;	
						switch($perfil) {
							case 1: $tipo = "Administrador"; break;
							case 2: $tipo = "Empleado"; break;
						}
						
						$datos_session= array('C_id_usuario'=>$id_usuario, 'C_nombre_usuario'=>$nombre_usuario, 'C_nom_usuario'=>$nom_usuario, 'C_perfil'=>$perfil, 'C_tipo'=>$tipo );
						$this->session->set_userdata($datos_session);
						echo "OK=".$id_usuario;
						exit();
					} else {
						echo "ERROR=Datos Incorrectos";
						exit();
					}
				}elseif($row->estado == "0") {
					echo "ERROR=El usuario se encuentra SUSPENDIDO, por favor comuniquese con el Administrador; Gracias!";
					exit();
				}
			}
			if($datos == '')
				echo "ERROR=El usuario NO EXISTE, Por favor intente de nuevo!";
			
			//echo "entro --".$this->input->post('usuario').'---'.$this->input->post('contrasena');
		}
	}
}
