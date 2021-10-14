<?php
 class Docente_carrera_model extends CI_Model {

     public function select_where_doccarrera_docid($doc_id)
     {
        $this->db->select('carr_nombre, tipoperi_periodo,anio');
        $this->db->from('docente d');
        $this->db->join('carrera c','d.doc_id= c.carr_id');
        $this->db->join('tipo_periodo tp','d.doc_id = tp.tipoperi_id');
        $this->db->join('docente_carrera dc','d.doc_id= dc.docar_id');
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 

    }

    public function select_where_carrera_usuarios($carr_id)
    {
        $this->db->select('doc_numemp,doc_nombres,doc_paterno,doc_materno,usu_nombre, usu_contrasena,carr_nombre, res_nombres, res_paterno, res_materno');
        $this->db->from('docente d');
        $this->db->join('usuario u','d.usu_id= u.usu_id');
        $this->db->join('carrera c','d.carr_id = c.carr_id');
        $this->db->join('responsable r','r.res_id = c.res_id');
        $this->db->where(array('d.carr_id' => $carr_id));
        $consulta = $this->db->get();
        return $consulta->result(); 
    }

}
