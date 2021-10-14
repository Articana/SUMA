<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Municipio_model extends CI_Model {

	public function select_municipio()
	{
		$this->db->order_by('mun_nombre', 'ASC');
        $this->db->select('mun_id, e.est_nombre, mun_nombre');
        $this->db->from('municipio dc');
        $this->db->join('estado e', 'dc.est_id = e.est_id');
		 $consulta = $this->db->get();
        return $consulta->result();
	}

	public function insert_municipio($data)
	{
		$this->db->insert('municipio', $data);
	}

     public function delete_municipio($mun_id)
    {
        $this->db->delete('municipio', array('mun_id' => $mun_id));
    }
	
 	public function get_municipio($mun_id) 
    {
    	$consulta = $this->db->get_where('municipio',array('mun_id' => $mun_id)); 
		if ($consulta->num_rows()> 0) 
    	{ 
    		return $consulta->result(); 
    	} else 
    	{ 
    		return false; 
    	} 
    } 

    public function update_municipio($data, $mun_id) 
    {
     	$this->db->where(array('mun_id' => $mun_id)); 
     	$this->db->update('municipio',$data); 
    }

}

/* End of file Municipio_model.php */
/* Location: ./application/models/Municipio_model.php */