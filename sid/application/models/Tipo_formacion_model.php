<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_formacion_model extends CI_Model {

	public function insert_tipo_formacion($data)
	{
		$this->db->insert('tipo_formacion', $data);
	}

	public function select_tipo_formacion()
	{
	 	$this->db->select('tipoform_id,tipoform_nombre');
		$this->db->from('tipo_formacion');
        	$this->db->order_by('tipoform_nombre', 'ASC');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function delete_tipo_formacion($tipoform_id)
    {
    	$this->db->delete('tipo_formacion', array('tipoform_id' => $tipoform_id));
    }

}

/* End of file Tipo_formacion_model.php */
/* Location: ./application/models/Tipo_formacion_model.php */
