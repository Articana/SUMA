<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domicilio_model extends CI_Model {

	public function select_where_domicilio($doc_id)
    {
        $this->db->select('d.doc_nombres, d.doc_paterno, d.doc_materno, dm.dom_id, dm.dom_calle, dm.dom_numero, dm.dom_postal, m.mun_nombre, dm.dom_fraccionamiento');
        $this->db->from('domicilio dm');
        $this->db->join('municipio m', ' dm.mun_id = m.mun_id' );
        $this->db->join('docente d', 'dm.doc_id = d.doc_id' );
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get(); 
        return $consulta->result();
    }

	public function get_domicilio($dom_id)
	{
		$consulta = $this->db->get_where('domicilio', array('dom_id' => $dom_id));
		if ($consulta->num_rows() > 0){
			return $consulta->row_array();
		} else {
			return false;
		}  
	}

	public function insert_domicilio($data)
	{                  
	   $this->db->insert('domicilio', $data);   	
    }

	public function update_domicilio($data, $dom_id)
	{
		$this->db->where(array('dom_id' => $dom_id));
		$this->db->update('domicilio',$data);
	}

	public function delete_domicilio($dom_id)
	{
		$this->db->delete('domicilio', array('dom_id' => $dom_id));   
	}

}

/* End of file Domicilio_model.php */
/* Location: ./application/models/Domicilio_model.php */