<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academia_model extends CI_Model {

	public function insert_academia($data)
	{             
	    $consulta=$this->db->insert('academia', $data);  
        return $consulta; 	
    }

    public function select_academia()
	{		
		$consulta = $this->db->get('academia');
		return $consulta->result();
	}

	public function select_where_academia($doc_id)
	{
		$this->db->select('aca_nombre');
        $this->db->from('docente d');
        $this->db->join('academia aca','d.doc_id= aca.aca_id ');
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 

	}

	public function delete_academia($aca_id)
    {
        $this->db->delete('academia', array('aca_id' => $aca_id));         
    }
    
    public function get_academia($aca_id)
    {
        $consulta = $this->db->get_where('academia',array('aca_id' =>  $aca_id));
            if ($consulta->num_rows()> 0) 
            {
                return $consulta->row_array();
            }else 
            {
                return false;
            }       
    }

    public function update_academia($data, $aca_id)
    {
        $this->db->where(array('aca_id' => $aca_id));
        $this->db->update('academia',$data);
    }
}