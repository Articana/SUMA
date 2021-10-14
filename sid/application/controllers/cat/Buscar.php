<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buscar extends CI_Controller {

	
    public function isLogin()
    {
        if ($this->session->has_userdata('userid') && $this->session->has_userdata('username') && $this->session->has_userdata('permiso')) {
            
        } else {
            redirect(base_url('sec/invalidar'));
        }
    }

    public function empleado()
    {
        $this->isLogin();
        $this->load->model('Docente_model');
        $doc_numemp=$this->input->post('doc_numemp');
        $respuesta = $this->Docente_model->select_where_empleado($doc_numemp);
        $data = array('docentes'=> $respuesta,
                     'permiso'  =>$this->session->userdata('permiso') );
        
        $this->load->view('header', array('title' => 'SID'));
        $permiso=$this->session->userdata('permiso');
        if($permiso == 5)
            {
                $this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('cac/buscar_empleado', $data);
                 }
        if($permiso == 3)
            {
                $this->load->view('navbar_rec.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('cac/buscar_empleado', $data);
                 }

	if($permiso == 9)
            {
                $this->load->view('navbar_rh.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('cac/buscar_empleado', $data);
                 }

        $this->load->view('footer');

    }

    public function empleadire()
    {
        $this->isLogin();
        $this->load->model('Responsable_model');
        $res_numemp=$this->input->post('res_numemp');
        $respuesta = $this->Responsable_model->select_where_empleado($res_numemp);
        $data = array('responsables'=> $respuesta,
                     'permiso'  =>$this->session->userdata('permiso') );
        
        $this->load->view('header', array('title' => 'SID'));
        $permiso=$this->session->userdata('permiso');
        if($permiso == 5)
            {
                $this->load->view('navbar_cac.php', array('current_user' => $this->session->userdata('username')));
                $this->load->view('cac/buscar_empleadodire', $data);
                 }
       
                 $this->load->view('footer');
    }


}
