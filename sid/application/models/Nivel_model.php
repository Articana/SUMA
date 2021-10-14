<?php

class Nivel_model extends CI_Model
 {
 	public function __construct()
 	{
 		$this->load->database();
 	}

 	public function insert_nivel($data)
	{
		$this->db->insert('nivel', $data);
	}

	public function select_nivel()
	{
		$this->db->select('nivel_id, nivel_desc');
		$this->db->from('nivel');
        $this->db->order_by('nivel_desc','ASC');
		$consulta = $this->db->get();
		return $consulta->result();
    }

    public function delete_nivel($nivel_id)
    {
    	$this->db->delete('nivel', array('nivel_id' => $nivel_id));
    }

    public function get_nivel($nivel_id) 
    {
        $consulta = $this->db->get_where('nivel',array('nivel_id' => $nivel_id)); 

        if ($consulta->num_rows()> 0) 
        { 
            return $consulta->result(); 
        } else 
        { 
            return false; 
        } 
    }

    public function update_nivel($data, $nivel_id) 
    {
        $this->db->where(array('nivel_id' => $nivel_id)); 
        $this->db->update('nivel',$data); 
    }

}