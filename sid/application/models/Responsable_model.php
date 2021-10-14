<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsable_model extends CI_Model {

	public function select_responsable()
	{
      $this->db->select('responsable.res_id, responsable.res_nombres,responsable.res_numemp, responsable.res_paterno,responsable.res_materno, u.usu_id, usu_nombre ');
      $this->db->from('responsable');
      $this->db->join('usuario u','u.usu_id = responsable.usu_id');
		  $this->db->order_by('res_nombres', 'ASC');
    	$consulta = $this->db->get();
   	    return $consulta->result();
	}

  public function select_resp()
  {
    $this->db->select('responsable.res_id, responsable.res_nombres,responsable.res_numemp, responsable.res_paterno,responsable.res_materno');
      $this->db->from('responsable');
      $this->db->order_by('res_paterno', 'ASC');
      $consulta = $this->db->get();
        return $consulta->result();
  }

	public function select_where_resp_usu_id($usu_id = 0)
	{
		if($usu_id != 0){
			$this->db->where(array('usu_id' => $usu_id))->limit(1);
			$consulta = $this->db->get('responsable');

			if ($consulta->num_rows() == 1){
				return $consulta->result();
			} else {
				return FALSE;
			}
		} else {
			return FALSE;
		}
	}
	
	public function select_where_carrera_dir($res_id)
     {
        $this->db->select('carrera.carr_id, carrera.carr_nombre,carrera.carr_abreviatura, responsable.res_id, responsable.res_nombres, responsable.res_paterno,responsable.res_materno ');
        $this->db->from('carrera');
        $this->db->join('responsable','responsable.res_id = carrera.res_id');
        $this->db->where(array('responsable.res_id' => $res_id));
        $consulta = $this->db->get();
        return $consulta->result(); 
    }

    public function insert_director($inforesp,$usuario)
  	{
    	$this->db->insert('usuario', $usuario);
    	$inforesp['usu_id']=$this->db->insert_id();
    	$this->db->insert('responsable', $inforesp);
  	}

      public function insert_docente($infodocente,$infocontacto,$usuario)
    {
      $this->db->insert('usuario', $usuario);
      $infodocente['usu_id']=$this->db->insert_id();
      $this->db->insert('docente', $infodocente);
      $infocontacto['doc_id']=$this->db->insert_id();
      $this->db->insert('contacto', $infocontacto);
    }


  	public function update_director($inforesp, $res_id)
    {
      $this->db->where(array('res_id' => $res_id)); 
      $this->db->update('responsable', $inforesp);
    }

    public function get_director($res_id=0)
  	{
    	if ($res_id != 0) {

          $this->db->select('responsable.res_id, responsable.res_nombres,responsable.res_numemp, responsable.res_paterno,responsable.res_materno, u.usu_id,u.usu_nombre ');
          $this->db->from('responsable');
          $this->db->join('usuario u','u.usu_id = responsable.usu_id');
          $this->db->where(array('res_id' => $res_id));
      		$consulta = $this->db->get();
      		if ($consulta->num_rows()> 0)
     		{
      		return $consulta->result();
      		}else 
      		{
      		return FALSE;
      		}
    	}
  	}

  	public function delete_director($res_id)
	{
		$this->db->delete('responsable', array('res_id' => $res_id));
	}


  public function select_where_empleado($res_numemp = 0)
    {
      if ($res_numemp != 0)
      {
        $this->db->where(array('res_numemp' => $res_numemp))->limit(1);
        $consulta = $this->db->get('responsable');

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

}

?>