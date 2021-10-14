<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Institucion_model extends CI_Model {

	public function select_institucion() {
		$this->db->order_by('inst_nombre','ASC');
		$consulta = $this->db->get('institucion');
		return $consulta->result();
	}

	public function insert_institucion($info)
	{
		$this->db->insert('institucion', $info);
	}

	public function delete_institucion($inst_id = 0)
  	{
      if($inst_id !=0)
      {
        $tables = array('institucion', 'docente_formacion');
        $this->db->delete($tables, array('inst_id' => $inst_id));
      }
  	}

  	public function update_institucion($infoinstitucion,$inst_id)
  	{
      $this->db->where(array('inst_id' => $inst_id)); 
      $this->db->update('institucion', $infoinstitucion);
  	}

   public function select_where_institucion_id($inst_id = 0)
   {
      if($inst_id != 0)
      {
        $consulta = $this->db->get_where('institucion',array('inst_id' => $inst_id));
        if ($consulta->num_rows()> 0)
        {
        return $consulta->result();
        }else 
        {
        return FALSE;
        }
      }
   }

	
}

/* End of file Institucion_model.php */
/* Location: ./application/models/Institucion_model.php */