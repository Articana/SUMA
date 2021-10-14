<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Listar extends CI_Controller {

	public function isLogin()
    {
        if (!$this->session->has_userdata('userid') && !$this->session->has_userdata('username') && !$this->session->has_userdata('permiso')) {
            redirect(base_url('sec/invalidar'));
        }
    }

	public function index()
	{
		show_404();
	}

	public function academia()
	{
		$this->isLogin();
		
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Carrera_model');

		$datos = array('carrera' => $this->Carrera_model->select_carrera());
		$this->load->view('/cac/listar_carrera', $datos);
	}

	public function academia_miembros()
	{
		$this->isLogin();

		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Academia_miembros_model');
		$respuesta->$this->Academia_miembros_model->select_academia_miembros();
	}

	public function carrera()
	{
		$this->isLogin();

		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Carrera_model');

		$datos = array('carrera' => $this->Carrera_model->select_carrera());
		$this->load->view('/cac/listar_carrera', $datos);
	}

	
	public function carrera_dir($doc_id = 0)
	{
		$this->isLogin();

		if ($permiso != 1 ) {
            redirect(base_url('sec/invalidar'));
        }
        if($doc_id != 0){

		$this->load->model('Carrera_model');

		$datos = array('carrera' => $this->Carrera_model->select_carrera());
		$this->load->view('/cac/listar_carrera', $datos);
		}
	}

	public function cuerpo_academico()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Cuerpo_academico_model');
		$respuesta->$this->Cuerpo_academico_model->select_cuerpo_academico();
	}

	public function cuerpo_academico_miembros()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Cuerpo_academico_miembros_model');

		$datos = array('miembro' => $this->Cuerpo_academico_miembros_model->select_where_cuerpomiembros_id($doc_id));
		$this->load->view('/cac/listar_miembros_ca', $datos);
	}

	public function estado()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Estado_model');
		$respuesta->$this->Estado_model->select_estado();
	}

	public function municipio()
	{
		$this->isLogin();
		
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }

		$this->load->model('Municipio_model');
		$respuesta->$this->Municipio_model->select_municipio();
	}

	public function nivel()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Nivel_model');
		$respuesta->$this->Nivel_model->select_nivel();
	}

	public function tipo_categoria()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_categoria_model');
		$respuesta->$this->Tipo_categoria_model->select_tipo_categoria();
	}


	public function docente_categoria()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Docente_categoria_model');
		$respuesta->$this->Docente_categoria_model->select_docente_categoria();
	}

	 public function docente_directorio()
        {
                $this->isLogin();
                if ($permiso != 3 && $permiso != 5 ) {
           	 redirect(base_url('sec/invalidar'));
        	}
                $this->load->model('Docente_model');
                $respuesta->$this->Docente_model->select_docente_directorio();
        }



	public function tipo_formacion()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_formacion_model');
		$respuesta->$this->Tipo_formacion_model->select_tipo_formacion();
	}

	public function vrtipo_modalidad()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_modalidad_formacion_model');

		$dato = array('modalidad' => $this->Tipo_modalidad_formacion_model->select_tipo_modalidad_formacion());
		$this->load->view('/cac/listar_tipo_modalidad', $dato);
	}

	public function tipo_habilitacion($tnh_id=0)
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
           	 redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Nivel_habilitacion_model');
        $respuesta = $this->Nivel_habilitacion_model->select_nivel_habilitacion();
        $data = array('nivel'=>$respuesta );

        $this->load->view('cac/listar_habilitacion', $data);
	}

	public function tipo_nombramiento()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_nombramiento_model');

		$datos = array('nombramiento' => $Tipo_nombramiento_model->select_tipo_nombramiento());
		$this->load->view('/cac/listar_tipo_nombramiento', $datos);
	}


	public function tipo_titulo()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
          	  redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_titulomodel');

		$dato = array('titulo' => $this->Tipo_titulomodel->select_tipo_titulo());
		$this->load->view('/cac/listar_tipo_titulo', $dato);
	}


	public function tipo_periodo()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Tipo_periodo_model');
		$respuesta = $this->Tipo_periodo_model->select_tipo_periodo();
		$data = array('periodo' => $respuesta);
		$this->load->view('cac/listar_periodo', $data);
	}

	public function usuario()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Usuario_model');
		$respuesta = $this->Usuario_model->select_usuario();
		$data = array('usuario' => $respuesta);
		$this->load->view('cac/listar_usuario', $data);
	}

	public function institucion()
	{
		$this->isLogin();
		if ($permiso != 3 && $permiso != 5 ) {
            redirect(base_url('sec/invalidar'));
        }
		$this->load->model('Institucion_model');
		$respuesta = $this->Institucion_model->select_institucion();
		$data = array('institucion' => $respuesta);
		$this->load->view('cac/listar_institucion', $data);
	}



}
