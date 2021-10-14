<?php 

class Tipo_periodo_model extends CI_Model
{

	public function select_tipo_periodo()
	{		
		$consulta = $this->db->get('tipo_periodo');

		return $consulta->result();
	}

	 public function insert_tipo_periodo($infotipoperi)
  	{
  		$this->db->insert('tipo_periodo', $infotipoperi);
  	}

  	 public function delete_tipo_periodo($tipoperi_id)
  	{
    	$this->db->delete('tipo_periodo', array('tipoperi_id' => $tipoperi_id));
  	}

  	public function update_tipo_periodo($infotipoperi,$tipoperi_id)
  	{
	  	$this->db->where(array('tipoperi_id' => $tipoperi_id)); 
	    $this->db->update('tipo_periodo', $infotipoperi);
  	}

}