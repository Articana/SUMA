<?php
 class Carrera_model extends CI_Model {

	public function insert_carrera($data)
	{
        $consulta=$this->db->insert('carrera', $data);  
        return $consulta;  	
    }

    public function select_carrera()
	{
	$this->db->select('c.carr_id,c.carr_nombre,c.carr_abreviatura, r.res_id, r.res_nombres, r.res_paterno,r.res_materno');
	$this->db->from('carrera c');
	$this->db->join('responsable r', 'r.res_id = c.res_id');
	$this->db->order_by('carr_nombre', 'DESC');
	$consulta = $this->db->get();
        return $consulta->result();

	}

     public function select_where_carrera_docid($doc_id)
     {
        $this->db->select('doc_nombres,doc_paterno,doc_materno,carr_nombre, tipoperi_periodo, anio');
        $this->db->from('docente d');
        $this->db->join('carrera c','d.doc_id= c.carr_id');
        $this->db->join('tipo_periodo tp','d.doc_id = tp.tipoperi_id');
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 
    }


     public function select_where_carrera_dir($doc_id)
     {
        $this->db->select('carrera.carr_id, carrera.carr_nombre,carrera.carr_abreviatura, docente.doc_id, docente.doc_nombres, docente.doc_paterno,docente.doc_materno ');
        $this->db->from('carrera');
        $this->db->join('docente','docente.doc_id = carrera.doc_id');
        $this->db->where(array('docente.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 
    }

    public function delete_carrera($carr_id=0)
    {
        $this->db->delete('carrera', array('carr_id' => $carr_id));         
    }

    public function get_carrera($carr_id)
    {
        $consulta = $this->db->get_where('carrera',array('carr_id' =>  $carr_id));
            if ($consulta->num_rows()> 0) 
            {
                return $consulta->row_array();
            }else 
            {
                return false;
            }  
    }
  
    public function update_carrera($data , $carr_id)
    {
       $this->db->where(array('carr_id' => $carr_id));
        $this->db->update('carrera',$data);
    }

}
