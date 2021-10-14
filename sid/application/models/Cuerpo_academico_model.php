<?php 
class Cuerpo_academico_model extends CI_Model {

	public function insert_cuerpo_academico($infocuerpo)
	{
	 	$this->db->insert('cuerpo_academico', $infocuerpo);	 
	} 

	public function select_cuerpo_academico()
	{
		$this->db->select('cue_id, n.tnh_descripcion, c.carr_nombre,cue_nombre');
		$this->db->from('cuerpo_academico ca');
		$this->db->join('tipo_nivel_habilitacion n', 'ca.tnh_id = n.tnh_id');
		$this->db->join('carrera c', 'ca.carr_id = c.carr_id');
		$query = $this->db->get();
		return $query->result();
    }

    public function select_where_cuerpo_id($doc_id)
    {
    	$this->db->select('doc_nombres,doc_paterno,doc_materno,tnh_descripcion, carr_nombre, cuerpo_academico.cue_nombre');
    	$this->db->from('docente d');
    	$this->db->join('carrera c','d.doc_id= c.carr_id ');
    	$this->db->join('cuerpo_academico ca ','d.doc_id= ca.cue_id ');
		$this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result();

    }

	public function delete_cuerpo_academico($cue_id)
    {
    	$this->db->delete('cuerpo_academico', array('cue_id' => $cue_id));
    }


    public function get_cuerpo_academico($cue_id)
    {
        $consulta = $this->db->get_where('cuerpo_academico',array('cue_id' => $cue_id)) ; 

        if ($consulta->num_rows()> 0) 
        { 
            return $consulta->result();
        } else 
        { 
            return false; 
        } 
    }


    public function update_cuerpo_academico($data, $cue_id)
    {    
        $this->db->where(array('cue_id' => $cue_id)); 
        $this->db->update('cuerpo_academico',$data); 
    }


   

}