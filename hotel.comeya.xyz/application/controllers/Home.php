<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');

		//if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
		//	redirect(base_url());
		//} 
	}

	public function index() {
		/*if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());			
		} else*/ {
			$data_usua['contenido']='habitacion';

			$data_usua['titulo']="";
			$data_usua['origen']="";
			//$data_usua['entrada_js']='_js/habitacion.js';
			$data_usua['librerias_css']='';
			$data_usua['librerias_js']='';
			$this->load->view('template',$data_usua);
		}
	}

}
