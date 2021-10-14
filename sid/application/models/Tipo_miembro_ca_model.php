<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipo_miembro_ca_model extends CI_Model {

public function select_tipo_miembro_ca()
    {
        $consulta = $this->db->get('tipo_miembro_ca');
        return $consulta->result();
    }

}