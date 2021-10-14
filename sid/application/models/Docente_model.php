<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Docente_model extends CI_Model {

	public function select_docente()
	{
		$this->db->select('docente.doc_id,usuario.usu_nombre,docente.doc_nombres, docente.doc_paterno, docente.doc_materno,
		docente.doc_fechanac,docente.doc_fechain, docente.doc_numemp, docente.doc_explab,docente.doc_estatus');
		$this->db->from('docente');
		$this->db->join('usuario','usuario.usu_id = docente.usu_id ');
	        $this->db->order_by('doc_paterno', 'ASC');
		$resultado = $this->db->get();
		return $resultado->result();
	}

    public function select_where_paterno($letra = 'A')
    {
      $this->db->select('d.doc_id,doc_numemp,doc_nombres,doc_paterno,doc_materno,carr_nombre');
      $this->db->from('docente d');
      $this->db->join('carrera c','d.carr_id = c.carr_id');
      $this->db->like('doc_paterno', $letra, 'after');
      $this->db->order_by('doc_paterno','ASC');
      $resultado = $this->db->get();
      return $resultado->result();
    }

    public function select_where_paterno_carr($letra = 'A',$carr_id)
    {
      $this->db->select('docente.doc_id,docente.doc_numemp,docente.doc_nombres,docente.doc_paterno, docente.doc_materno, carrera.carr_id,carrera.carr_nombre, carr_abreviatura');
      $this->db->from('docente ');
      $this->db->join('carrera','docente.carr_id = carrera.carr_id');
      $this->db->where(array('carrera.carr_id' => $carr_id));
      $this->db->like('docente.doc_paterno', $letra, 'after');
      $this->db->order_by('doc_paterno','ASC');
      $resultado = $this->db->get();
      return $resultado->result();

    }

	public function select_where_docente_usu_id($usu_id = 0)
	{
		if($usu_id != 0){
			$this->db->where(array('usu_id' => $usu_id))->limit(1);
			$consulta = $this->db->get('docente');

			if ($consulta->num_rows() == 1){
				return $consulta->result();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}

	public function select_where_docente_id($doc_id = 0)
	{
		if ($doc_id != 0) {
			$this->db->where(array('doc_id' => $doc_id))->limit(1);
			$consulta = $this->db->get('docente');

			if ($consulta->num_rows() == 1) {
				return $consulta->result();
			}
		} else {
			return FALSE;
		}
	}

	public function get_docente($doc_id=0)
  	{
    	if ($doc_id != 0) {
      		$consulta = $this->db->get_where('docente',array('doc_id' => $doc_id));
      		if ($consulta->num_rows()> 0)
     		{
      		return $consulta->result();
      		}else 
      		{
      		return FALSE;
      		}
    	}
  	}

	public function insert_docente($infodocente,$infocontacto,$usuario)
  	{
    	$this->db->insert('usuario', $usuario);
    	$infodocente['usu_id']=$this->db->insert_id();
    	$this->db->insert('docente', $infodocente);
    	$infocontacto['doc_id']=$this->db->insert_id();
    	$this->db->insert('contacto', $infocontacto);
  	}

  	public function select_where_empleado($doc_numemp = 0)
  	{
   	 	if ($doc_numemp != 0)
    	{
      	$this->db->where(array('doc_numemp' => $doc_numemp))->limit(1);
      	$consulta = $this->db->get('docente');

      	if ($consulta->num_rows()==1)
      	{
      	return $consulta->result();
      	}else 
      	{
     	    return FALSE;
      	}
    	}else{
        return FALSE;
      }
    }

    public function update_docente($infodocente, $doc_id)
    {
      $this->db->where(array('doc_id' => $doc_id)); 
      $this->db->update('docente', $infodocente);
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

    public function select_where_carrera_docente($carr_id)
    {
      $this->db->select('docente.doc_id,docente.doc_numemp,docente.doc_nombres,docente.doc_paterno,docente.doc_materno, carrera.carr_id,carrera.carr_nombre, carrera.carr_abreviatura');
      $this->db->from('docente ');
      $this->db->join('carrera','docente.carr_id = carrera.carr_id');
      $this->db->where(array('carrera.carr_id' => $carr_id));
      $this->db->order_by('doc_paterno','ASC');
      $resultado = $this->db->get();
      return $resultado->result();
    }


    public function select_docente_directorio()
    {
	    $this->db->select('doc_id,doc_numemp,doc_nombres,doc_paterno,doc_materno,doc_cvdir');
      	$this->db->from('docente');
        $this->db->order_by("doc_numemp", "ASC");
	    $resultado = $this->db->get();
        return $resultado->result();
	}

}

/* End of file Docente_model.php */
/* Location: ./application/models/Docente_model.php */
