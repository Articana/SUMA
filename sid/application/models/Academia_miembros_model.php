<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Academia_miembros_model extends CI_Model {

	public function insert_academia_miembros($data)
	{
		$this->db->insert('academia_miembros', $data);
	}

	public function select_where_academiamiembros($doc_id)
	{
	     $this->db->select('aca_mie_id, t.tipoperi_periodo, a.aca_nombre, d.doc_nombres, 
                           d.doc_paterno, d.doc_materno, aca_mie_estatus, anio');
         $this->db->from('academia_miembros am');
         $this->db->join('tipo_periodo t', 'am.tipoperi_id = t.tipoperi_id');
         $this->db->join('academia a', 'am.aca_id = a.aca_id');
         $this->db->join('docente d', 'am.doc_id = d.doc_id');

        $this->db->where(array('d.doc_id' => $doc_id));
        $this->db->order_by('anio','DESC');
        $consulta = $this->db->get();
        return $consulta->result(); 
	}

    public function select_academia_miembros_dir($carr_id)
    {
        $this->db->select('aca_mie_id, t.tipoperi_periodo, a.aca_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno, d.doc_numemp,aca_mie_estatus, anio, c.carr_id,c.carr_abreviatura, r.res_id');
        $this->db->from('academia_miembros am');
        $this->db->join('tipo_periodo t', 'am.tipoperi_id = t.tipoperi_id');
        $this->db->join('academia a', 'am.aca_id = a.aca_id');
        $this->db->join('docente d', 'am.doc_id = d.doc_id');
        $this->db->join('carrera c','d.carr_id = c.carr_id');
        $this->db->join('responsable r','r.res_id = c.res_id');
        $this->db->where(array('c.carr_id' => $carr_id));
        $this->db->order_by('d.doc_numemp','ASC');
        $this->db->order_by('anio','DESC');
        $consulta = $this->db->get();
        return $consulta->result();
    }

	public function select_academia_miembros()
	{
		$this->db->select('aca_mie_id, t.tipoperi_periodo, a.aca_nombre, d.doc_nombres, 
                           d.doc_paterno, d.doc_materno, d.doc_numemp,aca_mie_estatus, anio');
		$this->db->from('academia_miembros am');
		$this->db->join('tipo_periodo t', 'am.tipoperi_id = t.tipoperi_id');
		$this->db->join('academia a', 'am.aca_id = a.aca_id');
		$this->db->join('docente d', 'am.doc_id = d.doc_id');
        $this->db->order_by('d.doc_numemp','ASC');
        $this->db->order_by('anio','DESC');
		$consulta = $this->db->get();
		return $consulta->result();
    }

    public function get_academia_miembros($aca_mie_id = 0) 
    {
        $consulta = $this->db->get_where('academia_miembros',array('aca_mie_id' => $aca_mie_id));
        if ($consulta->num_rows()> 0) 
        { 
            return $consulta->result(); 
        } else 
        { 
            return false; 
        }      
    }
    
    public function update_academia_miembros($data, $aca_mie_id) 
    {
        $this->db->where(array('aca_mie_id' => $aca_mie_id)); 
        $this->db->update('academia_miembros',$data); 
    }

    public function delete_academia_miembros($aca_mie_id)
    {
        $this->db->delete('academia_miembros', array('aca_mie_id' => $aca_mie_id));
    }


    /* 
    SELECT aca_mie_id, t.tipoperi_periodo, a.aca_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno, d.doc_numemp,aca_mie_estatus, anio, c.carr_id, r.res_id FROM `academia_miembros` JOIN tipo_periodo t ON academia_miembros.tipoperi_id = t.tipoperi_id JOIN academia a ON academia_miembros.aca_id = a.aca_id JOIN docente d ON academia_miembros.doc_id = d.doc_id JOIN carrera c ON d.carr_id = c.carr_id JOIN responsable r ON r.res_id = c.res_id WHERE r.res_id='1' 
    */


}
