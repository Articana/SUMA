<?php
 class Carga_model extends CI_Model {

	public function insert_carga($data)
	{                 
	    $consulta=$this->db->insert('carga', $data);  
        return $consulta; 	
    }

    public function select_where_carga_id($doc_id)
    {
    	$this->db->select('car_id,tipoperi_periodo, are_nombre, car_grupo_tutorado,
                           car_hrs_frente_grupo, car_hrs_estadia, 
                           car_hrs_desarrollo_mat_didactico, car_hrs_academia_ca, 
                           car_hrs_apoyo_academ_admin, car_hrs_total_hsm, car_anio,
                           car_entrega_pro_rep_direccion ');
        $this->db->from('carga c');
        $this->db->join('tipo_periodo tp','c.tipoperi_id =tp.tipoperi_id');
        $this->db->join('area a','c.are_id = a.are_id');
        $this->db->join('docente d','c.doc_id = d.doc_id');
        $this->db->where(array('c.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 

    }

     public function select_where_carga()
    {
      $this->db->select('car_id,tipoperi_periodo, are_nombre, car_grupo_tutorado,
                           car_hrs_frente_grupo, car_hrs_estadia, 
                           car_hrs_desarrollo_mat_didactico, car_hrs_academia_ca, 
                           car_hrs_apoyo_academ_admin, car_hrs_total_hsm, car_anio,
                           car_entrega_pro_rep_direccion ');
        $this->db->from('carga c');
        $this->db->join('tipo_periodo tp','c.tipoperi_id =tp.tipoperi_id');
        $this->db->join('area a','c.are_id = a.are_id');
        $this->db->join('docente d','c.doc_id = d.doc_id');
        $consulta = $this->db->get();
        return $consulta->result(); 

    }

	
    
    public function delete_carga($car_id)
    {
      $this->db->delete('carga', array('car_id' => $car_id));
    }

 }
