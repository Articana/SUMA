<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_modalidad_formacion_model extends CI_Model {

	public function select_tipo_modalidad_formacion()
	{		
		$consulta = $this->db->get('tipo_modalidad_formacion');
		return $consulta->result();
	}


	public function delete_tipo_modalidad($tmf_id=0)
	{
        $this->db->delete('tipo_modalidad_formacion', array('tmf_id' => $tmf_id));         
	}

	public function insert_modalidad_formacion($dato)
	{
		 $consulta=$this->db->insert('tipo_modalidad_formacion', $dato);  
        return $consulta;
	}

}

/* End of file Tipo_modalidad_formacion_model.php */
/* Location: ./application/models/Tipo_modalidad_formacion_model.php */