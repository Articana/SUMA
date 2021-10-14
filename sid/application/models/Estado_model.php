<?php  

class Estado_model extends CI_Model{
	
	public function __construct()
	{
		$this->load->database(); 
	}

	public function insert_estado($data)
	{
		$this->db->insert('estado', $data);
	}


	public function select_estado()
	{	
        $this->db->order_by('est_nombre');
		$consulta = $this->db->get('estado');

		return $consulta->result();
	}

	public function delete_estado($est_id)
    {
    	$this->db->delete('estado', array('est_id' => $est_id));
    }

    public function select_where_estadoid($est_id)
    {
    	$this->db->select('est_id, est_nombre, est_codigo');
		$this->db->from('estado');
		$this->db->where(array('est_id' => $est_id));
		$consulta = $this->db->get();
		return $consulta->result();
    }


    public function select_where_estado_criterio($valor) 
    { 
    	$this->db->where('est_id', $valor); 
    	$this->db->or_where('est_nombre', $valor);  
    	$this->db->or_where('est_codigo', $valor); 
    	$this->db->from('estado'); 
    	$consulta=$this->db->get(); 
    	return $consulta->result(); 
    }


    public function get_estado($est_id=0)
    {
        if ($est_id != 0) {
            $consulta = $this->db->get_where('estado',array('est_id' => $est_id));
            if ($consulta->num_rows()> 0)
            {
            return $consulta->result();
            }else 
            {
            return FALSE;
            }
        }
    }

    public function update_estado($data, $est_id) 
    {
     	$this->db->where(array('est_id' => $est_id)); 
     	$this->db->update('estado',$data); 
    }


}

?>