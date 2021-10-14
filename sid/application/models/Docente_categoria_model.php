<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_categoria_model extends CI_Model {

	public function select_where_docente_categoriaid($doc_id)
    {
    	$this->db->select('doccat_id, d.doc_id,  d.doc_nombres, t.tiponomb_nombre, tc.tipocat_nombre, doccat_fecha');
		$this->db->from('docente_categoria dc');
		$this->db->join('docente d', 'dc.doc_id = d.doc_id');
		$this->db->join('tipo_nombramiento t', 'dc.tiponomb_id = t.tiponomb_id');
		$this->db->join('tipo_categoria tc', 'dc.tipocat_id = tc.tipocat_id');
		$this->db->where(array('d.doc_id' => $doc_id));
        $this->db->order_by('doccat_fecha','DESC');
		$consulta = $this->db->get();
		return $consulta->result();
    }

    public function insert_docente_categoria($data)
	{
		$this->db->insert('docente_categoria', $data);
	}


	public function select_docente_categoria()  
	{
		$this->db->select('doccat_id, d.doc_nombres,d.doc_paterno,d.doc_numemp, 
    		              d.doc_materno, t.tiponomb_nombre, tc.tipocat_nombre, doccat_fecha');
		$this->db->from('docente_categoria dc');
		$this->db->join('docente d', 'dc.doc_id = d.doc_id');
		$this->db->join('tipo_nombramiento t', 'dc.tiponomb_id = t.tiponomb_id');
		$this->db->join('tipo_categoria tc', 'dc.tipocat_id = tc.tipocat_id');
       /* $this->db->order_by('d.doc_paterno','ASC');*/
		$this->db->order_by('d.doc_numemp','ASC');
       		 $this->db->order_by('doccat_fecha', 'DESC');
		$consulta = $this->db->get();
		return $consulta->result();
    }


	public function delete_docente_categoria($doccat_id)
    {
    	$this->db->delete('docente_categoria', array('doccat_id' => $doccat_id));
    }

    public function get_docente_categoria($doccat_id) 
    {
        $consulta = $this->db->get_where('docente_categoria',array('doccat_id' => $doccat_id)); 
		if ($consulta->num_rows()> 0) 
        { 
           return $consulta->result(); 
        } else 
        { 
            return false;    
        }         
    }

    public function update_docente_categoria($data, $doccat_id) 
    {
        $this->db->where(array('doccat_id' => $doccat_id)); 
        $this->db->update('docente_categoria',$data); 
    } 

    public function select_where_categoria($p = 'A')
    {
      $this->db->select('docente.doc_id,doc_numemp,doc_nombres,doc_paterno,doc_materno, tipocat_nombre');
      $this->db->from('docente');
      $this->db->like('doc_paterno', $p, 'after');
      $this->db->join('docente_categoria','docente.doc_id = docente_categoria.doccat_id');
      $this->db->join('tipo_categoria','docente_categoria.doccat_id = tipo_categoria.tipocat_id');
      $this->db->order_by('doc_paterno','ASC');
      //$this->db->order_by('doccat_fecha', 'DESC');
      $resultado = $this->db->get();
      return $resultado->result();
    }

}

/* End of file Docente_categoria_model.php */
/* Location: ./application/models/Docente_categoria_model.php */
