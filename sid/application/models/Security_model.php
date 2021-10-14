<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security_model extends CI_Model {

	public function login($user, $pass)
	{
		$this->db->where(array('usu_nombre' => $user, 'usu_contrasena' => $pass));
		$this->db->limit(1);
		$consulta = $this->db->get('usuario');
			
		if ($consulta->num_rows() == 1){
			return $consulta->result();
		} else {
			return FALSE;
		}
	}

}

/* End of file Security_model.php */
/* Location: ./application/models/Security_model.php */