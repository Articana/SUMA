<?php 

class Nivel_habilitacion_model extends CI_Model{
	

	public function insert_tipo_nivel_habilitacion($data)
	{             
	    $consulta=$this->db->insert('tipo_nivel_habilitacion', $data);  
        return $consulta; 	
    }
    
    public function select_nivel_habilitacion()
	{
        $consulta = $this->db->get('tipo_nivel_habilitacion');
        return $consulta->result();
	}

	public function delete_tipo_nivel_habilitacion($tnh_id)
	{
        $this->db->delete('tipo_nivel_habilitacion', array('tnh_id' => $tnh_id));         
	}

	
}

?>