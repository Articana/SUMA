<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_titulo_model extends CI_Model {

	public function select_tipo_titulo() {
		$consulta = $this->db->get('tipo_titulo');
		return $consulta->result();
	}

	public function delete_tipo_titulo($tipotitulo_id=0)
	{
        $this->db->delete('tipo_titulo', array('tipotitulo_id' => $tipotitulo_id));         
	}

	public function insert_tipo_titulo($dato){

		$consulta=$this->db->insert('tipo_titulo', $dato);  
        return $consulta; 
	}
}

/* End of file Tipo_titulo_model.php */
/* Location: ./application/models/Tipo_titulo_model.php */