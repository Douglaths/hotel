<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

    //Constructor de la clase
    function __construct() {
        parent::__construct();
        date_default_timezone_set('America/Bogota');
        $this->load->model('General_model'); // Cargamos el modelo General_model
    }

    public function index() {
        $data_usua['contenido'] = 'clientes'; // Indicamos que cargue la vista 'clientes'
        $data_usua['clients'] = $this->General_model->get_clients(); // Obtenemos los clientes y los pasamos a la vista

        $data_usua['titulo'] = "Clientes";
        $data_usua['librerias_css'] = '';
        $data_usua['librerias_js'] = '';
        $this->load->view('template', $data_usua); // Cargamos la plantilla con los datos
    }
    
    public function crear_cliente() {
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'identificacion' => $this->input->post('identificacion'),
            'telefono' => $this->input->post('telefono'),
            'email' => $this->input->post('email'),
            'procedencia' => $this->input->post('procedencia'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
            'ocupacion' => $this->input->post('ocupacion'),
            'sexo' => $this->input->post('sexo'),
            'estado' => $this->input->post('estado'),
        );
    
        // Llama al método insert en el modelo
        $this->General_model->insert('clientes', $data); // Asegúrate de que 'clientes' es el nombre correcto de la tabla
        echo json_encode(array("status" => TRUE));
    }
    
    public function obtener_cliente($id) {
        $data = $this->General_model->get_by_id('clientes', 'id_cliente', $id);
        echo json_encode($data);
    }
    
    public function actualizar_cliente() {
        $id = $this->input->post('id_cliente');
        $data = array(
            'nombre' => $this->input->post('nombre'),
            'apellido' => $this->input->post('apellido'),
            'identificacion' => $this->input->post('identificacion'),
            'telefono' => $this->input->post('telefono'),
            'email' => $this->input->post('email'),
            'procedencia' => $this->input->post('procedencia'),
            'fecha_nacimiento' => $this->input->post('fecha_nacimiento'),
            'ocupacion' => $this->input->post('ocupacion'),
            'sexo' => $this->input->post('sexo'),
            'estado' => $this->input->post('estado'),
        );
        $this->General_model->update('clientes', $data, 'id_cliente', $id);
        echo json_encode(array("status" => TRUE));
    }
    
    public function eliminar_cliente($id) {
        $this->General_model->delete('clientes', 'id_cliente', $id);
        echo json_encode(array("status" => TRUE));
    }
    
    
    
}
