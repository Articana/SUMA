<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contacto_model extends CI_Model {

	public function select_where_contacto_id($doc_id)
    {
        $this->db->select('d.doc_nombres, d.doc_paterno, d.doc_materno, c.con_id, c.con_emailparti, c.con_emailinsti, c.con_teleparti, c.con_teleinsti');
        $this->db->from('contacto c');;
        $this->db->join('docente d', 'c.doc_id = d.doc_id' );
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta=$this->db->get(); 
        return $consulta->result();
    }

    public function update_contacto($data, $con_id)
    {
        $this->db->where(array('con_id' => $con_id));
        $this->db->update('contacto',$data);
    }

    public function get_contacto($con_id)
	{
		$consulta = $this->db->get_where('contacto', array('con_id' => $con_id));
		if ($consulta->num_rows() > 0){
			return $consulta->result();
		} else {
			return FALSE;
		}
	}

}

/* End of file Contacto_model.php */
/* Location: ./application/models/Contacto_model.php */