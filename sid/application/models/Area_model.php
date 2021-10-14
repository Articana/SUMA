<?php
class Area_model extends CI_Model {
  
  public function insert_area($infoarea)
  {
  	$this->db->insert('area', $infoarea);
  }

  public function select_area()
  {
    $this->db->order_by('are_nombre', 'ASC');
    $consulta = $this->db->get('area');
    return $consulta->result();
  }

  public function select_where_area_id($doc_id)
  {
      $this->db->select('are_nombre');
        $this->db->from('docente d');
        $this->db->join('area a','d.doc_id= a.are_id');
        $this->db->where(array('d.doc_id' => $doc_id));
        $consulta = $this->db->get();
        return $consulta->result(); 
  }

  public function delete_area($are_id)
  {
  	$this->db->delete('area',array('are_id' => $are_id));
  }

  public function update_area($infoarea,$are_id=0)
  {
  	$this->db->where(array('are_id' => $are_id)); 
    $this->db->update('area', $infoarea);
  }

  public function get_area($are_id)
  {
    if ($are_id != 0)
    {
      $consulta = $this->db->get_where('area',array('are_id' => $are_id));
      if ($consulta->num_rows()==1)
      {
      return $consulta->result();
      }else 
      {
      return FALSE;
      }
    }
  }
 } 	
  
?>