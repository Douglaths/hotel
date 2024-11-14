<?php if (!defined('BASEPATH')){exit('No direct script access allowed');}

class General_model extends CI_Model {

    function __construct(){
      date_default_timezone_set('America/Bogota');
    }

    function validar_usuario($usuario){
      $query = $this->db->query('SELECT u.id_usuario, AES_DECRYPT(u.clave, "-Jrs.78s#!") AS clave, u.nombre, u.apellido, u.estado, u.tipo_usuario   
			FROM usuarios u 
			WHERE u.usuario="'.$usuario.'" ');
      return $query->result();
    }

    public function get_rooms() {
      $this->db->select('id_habitacion, nombre, numero_camas, tipo_habitacion, valor, estado');
      $query = $this->db->get('habitaciones'); 
      return $query->result();
    }

    public function get_clients() {
      $this->db->select('id_cliente, nombre, apellido, identificacion, telefono, procedencia');
      $query = $this->db->get('clientes');
      return $query->result(); 
    }

    public function get_inventory() {
      $query = $this->db->query("
           SELECT 
            inventarios.id_inventario,
            inventarios.id_usuario,
            inventarios.id_producto,
            inventarios.entradas,
            inventarios.salidas,
            inventarios.id_habitacion,
            inventarios.fecha,
            inventarios.estado,
            productos.nombre AS producto_nombre
        FROM inventarios
        INNER JOIN productos ON inventarios.id_producto = productos.id_producto
      ");
      return $query->result(); // Retorna el resultado como un arreglo de objetos
    }

  
    // Insertar datos en la tabla
    public function insert($table, $data) {
        if ($this->db->insert($table, $data)) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    // Obtener todos los registros
    public function get_all($table) {
        return $this->db->get($table)->result();
    }

    // Obtener un registro específico por ID
    public function get_by_id($table, $id_column, $id) {
        return $this->db->get_where($table, array($id_column => $id))->row();
    }

    // Actualizar un registro
    public function update($table, $data, $id_column, $id) {
        $this->db->where($id_column, $id);
        return $this->db->update($table, $data);
    }

    // Eliminar un registro
    public function delete($table, $id_column, $id) {
        $this->db->where($id_column, $id);
        return $this->db->delete($table);
    }
   
}