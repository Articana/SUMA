<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cuerpo_academico_miembros_model extends CI_Model {


	public function insert_cuerpo_academico_miembros($data)
	{
                      
	    $consulta=$this->db->insert('cuerpo_academico_miembros', $data);  
        return $consulta; 	
    }

    public function select_where_cuerpomiembros_id($doc_id)
    {
    	$this->db->select('cam_id, ca.cue_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno, t.tmc_tipomiembro');
    	$this->db->from('cuerpo_academico_miembros cam');
    	$this->db->join('cuerpo_academico ca', 'cam.cue_id = ca.cue_id');
    	$this->db->join('tipo_miembro_ca t', 'cam.tmc_id = t.tmc_id');
        $this->db->join('docente d', 'cam.doc_id = d.doc_id');
    	$this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result();
    }

    public function select_cuerpo_academico_miembros()
    {
        $this->db->select('cam_id, ca.cue_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno,d.doc_numemp, t.tmc_tipomiembro');
        $this->db->from('cuerpo_academico_miembros cam');
        $this->db->join('cuerpo_academico ca', 'cam.cue_id = ca.cue_id' );
        $this->db->join('tipo_miembro_ca t', 'cam.tmc_id = t.tmc_id' );
        $this->db->join('docente d', 'cam.doc_id = d.doc_id' );
        $this->db->order_by('d.doc_paterno','ASC');
        $this->db->order_by('ca.cue_nombre', 'ASC');
        
        $consulta=$this->db->get();
        return $consulta->result();
    }

    public function select_cuerpo_academico_miembros_dir($carr_id)
    {
        $this->db->select('cam_id, ca.cue_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno,d.doc_numemp, t.tmc_tipomiembro, c.carr_abreviatura, r.res_id');
        $this->db->from('cuerpo_academico_miembros cam');
        $this->db->join('cuerpo_academico ca', 'cam.cue_id = ca.cue_id' );
        $this->db->join('tipo_miembro_ca t', 'cam.tmc_id = t.tmc_id' );
        $this->db->join('docente d', 'cam.doc_id = d.doc_id' );
        $this->db->join('carrera c','d.carr_id = c.carr_id');
        $this->db->join('responsable r','r.res_id = c.res_id');
        $this->db->where(array('c.carr_id' => $carr_id));
        $this->db->order_by('d.doc_paterno','ASC');
        $this->db->order_by('ca.cue_nombre', 'ASC');
        
        $consulta=$this->db->get();
        return $consulta->result();
    }

    public function delete_cuerpo_academico_miembros($cam_id=0)
    {
        $this->db->delete('cuerpo_academico_miembros', array('cam_id' => $cam_id)); 
    }

   public function get_cuerpo_academico_miembros($cam_id=0)
    {
        if ($cam_id != 0) {
           $consulta = $this->db->get_where('cuerpo_academico_miembros',array('cam_id' =>  $cam_id));
            if ($consulta->num_rows()> 0) 
            {
                return $consulta->result();
            }else 
            {
                return false;
            }
        }
               
    }

    public function update_cuerpo_academico_miembros($data, $cam_id)
    {
        $this->db->where(array('cam_id' => $cam_id));
        $this->db->update('cuerpo_academico_miembros',$data);
    }

    /*SELECT cam_id, ca.cue_nombre, d.doc_nombres, d.doc_paterno, d.doc_materno,d.doc_numemp, t.tmc_tipomiembro, c.carr_id, r.res_id FROM `cuerpo_academico_miembros` JOIN cuerpo_academico ca ON cuerpo_academico_miembros.cue_id = ca.cue_id JOIN tipo_miembro_ca t ON cuerpo_academico_miembros.tmc_id = t.tmc_id JOIN docente d ON cuerpo_academico_miembros.doc_id = d.doc_id JOIN carrera c ON d.carr_id = c.carr_id JOIN responsable r ON r.res_id = c.res_id WHERE r.res_id ='1' */

}