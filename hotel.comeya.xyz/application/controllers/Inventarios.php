<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventarios extends CI_Controller {

	//Constructor de la clase
	function __construct() {
		parent::__construct();
		date_default_timezone_set('America/Bogota');
        $this->load->model('General_model'); // Cargamos el modelo General_model

		//if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
		//	redirect(base_url());
		//} 
	}

	public function index() {
		/*if(!defined('CON_id_usuario') && $this->session->userdata('C_id_usuario')=="" ) {
			redirect(base_url());			
		} else*/ {
			$data_usua['contenido'] = 'inventarios'; // Indicamos que se cargue la vista 'inventarios'
        $data_usua['inventory'] = $this->General_model->get_inventory(); // Obtenemos los datos del inventario y los pasamos a la vista
        $data_usua['titulo'] = "Inventarios";
        $data_usua['librerias_css'] = '';
        $data_usua['librerias_js'] = '';
        $this->load->view('template', $data_usua); // Cargamos la plantilla con los datos
		}
	}

	 // Crear inventario
	 public function crear_inventario() {
        $data = array(
            'fecha' => $this->input->post('fecha'),
            'id_usuario' => $this->input->post('id_usuario'),
            'id_producto' => $this->input->post('id_producto'),
            'id_habitacion' => $this->input->post('id_habitacion'),
            'entradas' => $this->input->post('entradas'),
            'salidas' => $this->input->post('salidas'),
            'estado' => $this->input->post('estado'),
        );
        $this->General_model->insert('inventarios', $data);
        echo json_encode(array("status" => TRUE));
    }

    // Leer inventario (listar todos los registros)
    public function listar_inventarios() {
        $data = $this->General_model->get_all('inventarios');
        echo json_encode($data);
    }

    // Obtener un inventario específico por ID
    public function obtener_inventario($id) {
        $this->load->model('General_model');
        $inventory = $this->General_model->get_inventory();

        // Filtrar el inventario por el ID específico
        $data = null;
        foreach ($inventory as $item) {
            if ($item->id_inventario == $id) {
                $data = $item;
                break;
            }
        }
        echo json_encode($data);
    }

    // Actualizar inventario
    public function actualizar_inventario() {
        $id = $this->input->post('id_inventario');
        $data = array(
            'fecha' => $this->input->post('fecha'),
            'id_usuario' => $this->input->post('id_usuario'),
            'id_producto' => $this->input->post('id_producto'),
            'id_habitacion' => $this->input->post('id_habitacion'),
            'entradas' => $this->input->post('entradas'),
            'salidas' => $this->input->post('salidas'),
            'estado' => $this->input->post('estado'),
        );
        $this->General_model->update('inventarios', $data, 'id_inventario', $id);
        echo json_encode(array("status" => TRUE));
    }

    // Eliminar inventario
    public function eliminar_inventario($id) {
        $this->General_model->delete('inventarios', 'id_inventario', $id);
        echo json_encode(array("status" => TRUE));
    }

}
