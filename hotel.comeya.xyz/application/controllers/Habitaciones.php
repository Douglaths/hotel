<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Habitaciones extends CI_Controller {

    //Constructor de la clase
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Bogota');
        $this->load->model('Room_model');
        //if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
        //	redirect(base_url());
        //} 
    }

    public function index() {
        /*if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
            redirect(base_url());			
        } else*/ {
            $data_usua['contenido'] = 'habitaciones'; // Indicamos que se cargue la vista 'habitaciones'
            $data_usua['rooms'] = $this->Room_model->get_rooms(); // Pasamos las habitaciones al array principal

            $data_usua['titulo'] = "";
            $data_usua['origen'] = "";
            //$data_usua['entrada_js'] = '_js/habitacion.js';
            $data_usua['librerias_css'] = '';
            $data_usua['librerias_js'] = '';
            $this->load->view('template', $data_usua); // Cargamos la plantilla con todos los datos
        }
    }

}
