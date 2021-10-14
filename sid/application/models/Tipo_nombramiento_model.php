<?php 

class Tipo_nombramiento_model extends CI_Model{

	public function select_tipo_nombramiento()
	{		
		$consulta = $this->db->get('tipo_nombramiento');

		return $consulta->result();
	}

	public function insert_tipo_nombramiento($data)
	{             
	    $consulta=$this->db->insert('tipo_nombramiento', $data);  
        return $consulta; 	
    }

    public function delete_tipo_nombramiento($tiponomb_id=0)
	{
        $this->db->delete('tipo_nombramiento', array('tiponomb_id' => $tiponomb_id));         
	}
    
}

?>