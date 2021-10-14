<?php 

class Tipo_categoria_model extends CI_Model{

	public function __construct()
	{
		$this->load->database(); 
	}

	public function insert_tipo_categoria($data)
	{
		$this->db->insert('tipo_categoria', $data);
	}

	public function select_tipo_categoria()
	{
	        $this->db->select('tipocat_id,tipocat_nombre');
		$this->db->from('tipo_categoria');
       	        $this->db->order_by('tipocat_nombre', 'ASC');
		$consulta = $this->db->get();
		return $consulta->result();
	}

	public function delete_tipo_categoria($tipocat_id)
    {
    	$this->db->delete('tipo_categoria', array('tipocat_id' => $tipocat_id));
    }

}

?>
