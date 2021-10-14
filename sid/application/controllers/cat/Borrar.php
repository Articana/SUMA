<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Borrar extends CI_Controller {

	public function isLogin()
    {
        if ($this->session->has_userdata('userid') && $this->session->has_userdata('username') && $this->session->has_userdata('permiso')) {
            
        } else {
            redirect(base_url('sec/invalidar'));
        }
    }

	public function docente_formacion($docform_id = 0)
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 1 ) {
            redirect(base_url('sec/invalidar'));
        }

		if($docform_id != 0){
			$this->load->model('docente_formacion_model');
			$this->docente_formacion_model->delete_docente_formacion($docform_id);
		}
		redirect(base_url('doc'));
	}

	public function director($res_id = 0)
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		if($res_id != 0){
			$this->load->model('Responsable_model');
			$this->Responsable_model->delete_director($res_id);
		}
		redirect(base_url('cac/vrdirector'));
	}

	public function domicilio($dom_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 1 ) {
            redirect(base_url('sec/invalidar'));
        }

		if ($dom_id != 0) {
			$this->load->model('domicilio_model');
			$this->domicilio_model->delete_domicilio($dom_id);
		}
		redirect(base_url('doc'));
	}

	public function academia($aca_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($aca_id != 0) {
			$this->load->model('Academia_model');
			$this->Academia_model->delete_academia($aca_id);
		}
		redirect(base_url('cac'));
		
	}

	public function academiamiembros($aca_mie_id = 0)
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		if($aca_mie_id != 0){
			$this->load->model('Academia_miembros_model');
			$this->Academia_miembros_model->delete_academia_miembros($aca_mie_id);
		}
		redirect(base_url('cac')); 
	}


	public function cuerpo_academico($cue_id = 0)
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		
		if ($cue_id != 0) {
			$this->load->model('Cuerpo_academico_model');
            $this->Cuerpo_academico_model->delete_cuerpo_academico($cue_id);
		}
        redirect(base_url('cac'));       
	}

	public function cuerpo_academico_miembros($cam_id=0)
	{
		$this->isLogin();

		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        
		if ($cam_id != 0) {
			$this->load->model('Cuerpo_academico_miembros_model');
		    $this->Cuerpo_academico_miembros_model->delete_cuerpo_academico_miembros($cam_id);
		}
		redirect(base_url('cac'));
	}

	public function estado($est_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        
		if ($est_id != 0) {
			$this->load->model('Estado_model');
			$this->Estado_model->delete_estado();
		}
		redirect(base_url('cac')); 
	}

	public function municipio($mun_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        
		if ($mun_id != 0) {
			$this->load->model('Municipio_model');
			$this->Municipio_model->delete_municipio();
		}
		redirect(base_url('cac')); 
	}

	public function nivel($nivel_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($nivel_id != 0) {
			$this->load->model('Nivel_model');
			$this->Nivel_model->delete_nivel($nivel_id);
		}
		redirect(base_url('cac')); 
	}

	public function tipo_categoria($tipocat_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($tipocat_id = 0) {
			$this->load->model('Tipo_categoria_model');
			$this->Tipo_categoria_model->delete_tipo_categoria();
		}
		redirect(base_url('cac'));  
	}

	public function docente_categoria($doccat_id = 0, $doc_id=0,$letra='A')
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        	if ($permiso != 5 ) {
           	 redirect(base_url('sec/invalidar'));
       		 }
		if ($doccat_id != 0) {
			$this->load->model('Docente_categoria_model');
        	$this->Docente_categoria_model->delete_docente_categoria($doccat_id);
		}
        redirect(base_url('cac/vrdetalle'.'/'.$doc_id.'/'.$letra));
	//echo base_url('cac/vrdetalle'.'/'.$doc_id.'/'.$letra);
	}

	public function institucion($inst_id)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
       		 if ($permiso != 5 ) {
           	 redirect(base_url('sec/invalidar'));
        	}
        	if($inst_id != 0){
		$this->load->model('Institucion_model');
		$respuesta = $this->Institucion_model->delete_institucion($inst_id);
		$data = array('institucion' => $respuesta);
		}
		redirect(base_url('cac'));
	}

	public function tipo_formacion($tipoform_id = 0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        
		if ($tipoform_id != 0) {
			$this->load->model('Tipo_formacion_model');
			$this->Tipo_formacion_model->delete_tipo_formacion($tipoform_id);
		}
		redirect(base_url('cac')); 
	}

	public function tipo_modaliadad($tmf_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($tmf != 0) {
			$this->load->model('Tipo_modalidad_formacion_model');
		    $this->Tipo_modalidad_formacion_model->delete_tipo_modalidad($tmf_id);
		}
		redirect(base_url('cac'));  
	}

	public function tipo_habilitacion($tnh_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        if ($tnh_id != 0) {
		$this->load->model('Nivel_habilitacion_model');
        $respuesta = $this->Nivel_habilitacion_model->delete_tipo_nivel_habilitacion($tnh_id);
        }
		redirect(base_url('cac'));
	}


	public function tipo_nombramiento($tiponomb_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($tiponomb_id!= 0) {
			$this->load->model('Tipo_nombramiento_model');
		    $this->Tipo_nombramiento_model->delete_tipo_nombramiento($tiponomb_id);
		}
		redirect(base_url('cac'));    
	}


	public function tipo_titulo($tipotitulo_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($tipotitulo_id!= 0) {
			$this->load->model('Tipo_titulo_model');
		    $this->Tipo_titulo_model->delete_tipo_titulo($tipotitulo_id);
		}
		redirect(base_url('cac'));    
	}

	public function tipoperiodo($tipoperi_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($tipoperi_id!= 0) {
			$this->load->model('Tipo_periodo_model');
		    $this->Tipo_periodo_model->delete_tipo_periodo($tipoperi_id);
		}
		redirect(base_url('cac'));    
	}

	public function usuario($usu_id=0)
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
        if ($usu_id!= 0) {
		$this->load->model('Usuario_model');
		$respuesta = $this->Usuario_model->delete_usuario($usu_id);
		$data = array('usuario' => $respuesta);
		}
		redirect(base_url('cac'));
	}

	public function carga($car_id = 0,$doc_id=0,$letra='A')
	{
		$this->isLogin();
		$permiso = $this->session->userdata('permiso');
        if ($permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		if ($car_id != 0) {
			$this->load->model('Carga_model');
        	$this->Carga_model->delete_carga($car_id);
		}
        redirect(base_url('cac/vrdetalle'.'/'.$doc_id.'/'.$letra));       
	}

}
