<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_formacion_model extends CI_Model {

	public function delete_docente_formacion($docform_id)
	{
		$this->db->delete('docente_formacion', array('docform_id' => $docform_id));
	}

	public function update_docente_formacion($docform_data, $docform_id)
	{
		$this->db->where(array('docform_id' => $docform_id)); 
		$this->db->update('docente_formacion', $docform_data);
	}
	
	public function get_docente_formacion($docform_id)
	{
		$consulta = $this->db->get_where('docente_formacion', array('docform_id' => $docform_id));
		if ($consulta->num_rows() > 0){
			return $consulta->result();
		} else {
			return FALSE;
		}
	}

	public function select_docente_formacion()
	{
		$this->db->select('docente_formacion.docform_id, docente.doc_numemp,institucion.inst_nombre, tipo_formacion.tipoform_nombre, 
	  	 	tipo_titulo.tipotitulo_nombre,tipo_modalidad_formacion.tmf_descripcion,docente_formacion.docform_rama, docente_formacion.docform_fechaing, 
	  	 	docente_formacion.docform_fechaeg, docente_formacion.docform_estatus');
		$this->db->from('docente_formacion');
		$this->db->join('docente','docente.doc_id = docente_formacion.doc_id ');
		$this->db->join('institucion','institucion.inst_id = docente_formacion.inst_id ');
		$this->db->join('tipo_formacion','tipo_formacion.tipoform_id = docente_formacion.tipoform_id ');
		$this->db->join('tipo_titulo','tipo_titulo.tipotitulo_id = docente_formacion.tipotitulo_id ');
		$this->db->join('tipo_modalidad_formacion','tipo_modalidad_formacion.tmf_id = docente_formacion.tmf_id ');
		$this->db->order_by("docform_fechaeg", "desc");
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function select_docente_formacion_doc_id($doc_id)
	{
		$this->db->select('docente.doc_id, docente_formacion.docform_id, docente.doc_numemp, institucion.inst_nombre, tipo_formacion.tipoform_nombre, 
	  	 	tipo_titulo.tipotitulo_nombre, tipo_modalidad_formacion.tmf_descripcion, docente_formacion.docform_rama, docente_formacion.docform_fechaing, 
	  	 	docente_formacion.docform_fechaeg,docente_formacion.docform_ident,docente_formacion.docform_estatus');

		$this->db->from('docente_formacion');
		$this->db->join('docente','docente.doc_id = docente_formacion.doc_id ');
		$this->db->join('institucion','institucion.inst_id = docente_formacion.inst_id ');
		$this->db->join('tipo_formacion','tipo_formacion.tipoform_id = docente_formacion.tipoform_id ');
		$this->db->join('tipo_titulo','tipo_titulo.tipotitulo_id = docente_formacion.tipotitulo_id ');
		$this->db->join('tipo_modalidad_formacion','tipo_modalidad_formacion.tmf_id = docente_formacion.tmf_id ');
		$this->db->order_by("docform_fechaeg", "desc");
		$this->db->where(array('docente.doc_id' => $doc_id));
		$resultado = $this->db->get();
		return $resultado->result();
	}

	public function insert_docente_formacion($infodformacion)
	{
		$this->db->insert('docente_formacion', $infodformacion);
	}
	
}

/* End of file Docente_formacion_model.php */
/* Location: ./application/models/Docente_formacion_model.php */
