<?php
class Usuario_model extends CI_Model {

  public function select_usuario_id($doc_id)
  {
        $this->db->select('usu_nombre,usu_contrasena');
        $this->db->from('docente d');
        $this->db->join('usuario u','d.doc_id= u.usu_id');
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result();  
  }

  public function select_usuario()
    {
        $this->db->select('usuario.usu_id, usuario.usu_nombre, usuario.usu_contrasena,usuario.usu_permiso,docente.doc_numemp');
        $this->db->from('usuario');
        $this->db->join('docente','docente.usu_id = usuario.usu_id ');
        $this->db->order_by('doc_numemp', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function select_usuario_todo()
    {
        $where = "usu_permiso ='3' OR usu_permiso='5' OR  usu_permiso='9'";
        $this->db->select('usuario.usu_id, usuario.usu_nombre, usuario.usu_contrasena,usuario.usu_permiso');
        $this->db->from('usuario');
        $this->db->where($where);
        $this->db->order_by('usu_permiso', 'DESC');
        $query = $this->db->get();
        return $query->result();

    }

    /*public function select_u$this->db->where($where);suario_todo()
    {
        $this->db->select('usuario.usu_id, usuario.usu_nombre, usuario.usu_contrasena,usuario.usu_permiso');
        $this->db->from('usuario');
        $this->db->order_by('usu_permiso', 'DESC');
        $query = $this->db->get();
        return $query->result();
      }
*/

    public function select_usuario_director($carr_id)
    {
        $this->db->select('usu_nombre,usu_contrasena,usu_permiso,d.doc_nombres, d.doc_paterno, d.doc_materno, d.doc_numemp, c.carr_id, c.carr_abreviatura, r.res_id');
        $this->db->from('usuario u');
        $this->db->join('docente d','d.usu_id= u.usu_id');
        $this->db->join('carrera c','d.carr_id = c.carr_id');
        $this->db->join('responsable r','r.res_id = c.res_id');
        $this->db->where(array('c.carr_id' => $carr_id));
        $consulta = $this->db->get();
        return $consulta->result();   
    }

  public function select_where_usu_nombre($usu_nombre = 0)
    {
      if ($usu_nombre != 0)
      {
        $this->db->where(array('usu_nombre' => $usu_nombre))->limit(1);
        $consulta = $this->db->get('usuario');

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

    public function update_contrasena($data, $usu_id)
    {
        $this->db->where('usu_id', $usu_id);
        $this->db->update('usuario', $data);
    }

    public function insert_usuario($infousuario,$doc_id)
    {
        $this->db->insert('usuario', $infousuario);
        $ultimo_id = $this->db->insert_id();
        $docente = array(
                      'doc_numemp' => $doc_id,
                      'usu_id' =>$ultimo_id);
        $this->db->insert('docente', $docente);
    }

     public function insert_usuario_cac($infousuario)
    {
        $this->db->insert('usuario', $infousuario);
    }

  public function get_usuario($usu_id=0)
  {
    if ($usu_id != 0)
    {
      $consulta = $this->db->get_where('usuario',array('usu_id' => $usu_id));
      if ($consulta->num_rows()> 0)
      {
      return $consulta->result();
      }else 
      {
      return FALSE;
      }
    }
  }
  
    public function update_usuario($infousuario,$usu_id)
      {
        $this->db->where(array('usu_id' => $usu_id));
        $this->db->update('usuario', $infousuario);
    }


   public function delete_usuario($usu_id)
    {
      $tables = array('usuario', 'docente');
      $this->db->delete($tables, array('usu_id' => $usu_id));
    //$this->db->delete('usuario', array('usu_id' => $usu_id));
    }

  
}
?>