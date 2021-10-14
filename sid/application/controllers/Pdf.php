<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pdf extends CI_Controller {

	public function isLogin()
    	{
          if ($this->session->has_userdata('userid') && $this->session->has_userdata('username') && $this->session->has_userdata('permiso')) {
            $this->redirectArea();
          } else {
            redirect(base_url('sec/invalidar'));
       	 }
    	}

    public function redirectArea()
    {
        $permiso = $this->session->userdata('permiso');
        if ($permiso != 5 && $permiso != 9 && $permiso != 3 && $permiso != 11) {
            redirect(base_url('sec/invalidar'));
        }
    }

	public function index()
	{
		show_404();
	}

	public function listado()
    {
	    $this->isLogin();

    	$this->load->library('Html2pdf');
    	$this->crearDirectorio();
    	$nombreArchivo = 'listado.pdf';
    	$this->html2pdf->folder('./download/');
    	$this->html2pdf->paper('a4','portrait');
    	$this->html2pdf->filename($nombreArchivo);

        $this->load->model('Docente_carrera_model');
        $carr_id= $this->input->post('carr_id');
        $respuesta = $this->Docente_carrera_model->select_where_carrera_usuarios($carr_id);
        $data = array('docusuarios' => $respuesta);

       
        $this->html2pdf->html(utf8_decode( $this->load->view('cac/docusuarios', $data,true)));
        if ($this->html2pdf->create('save')) {
        	$this->mostrar($nombreArchivo);
        }
   	 }


	public function dficha($doc_id = 0)
    {
	   $this->isLogin();

    	$this->load->library('Html2pdf');
    	$this->crearDirectorio();
    	$nombreArchivo= 'ficha.pdf';
    	$this->html2pdf->folder('./download/');
    	$this->html2pdf->paper('a4','portrait');
    	$this->html2pdf->filename($nombreArchivo);

        $this->load->model('Docente_model');
	    $this->load->model('Domicilio_model');
	    $this->load->model('Contacto_model');
        $respuesta = $this->Docente_model->select_where_docente_id($doc_id);
	    $contactos = $this->Contacto_model->select_where_contacto_id($doc_id);
	    $domicilios = $this->Domicilio_model->select_where_domicilio($doc_id);
        $data = array('docficha' => $respuesta,
		      'contacto' => $contactos,
		      'domicilio'=> $domicilios
		);

        $this->html2pdf->html(utf8_decode( $this->load->view('cac/docficha', $data,true)));
	       if ($this->html2pdf->create('save')) {
        	   $this->mostrar($nombreArchivo);
	       }

    	}

	public function dtrayectoria($doc_id = 0)
    {
	    $this->isLogin();
        $this->load->library('Html2pdf');
        $this->crearDirectorio();
        $nombreArchivo= 'trayectoria.pdf';
        $this->html2pdf->folder('./download/');
        $this->html2pdf->paper('a4','portrait');
        $this->html2pdf->filename($nombreArchivo);

        $this->load->model('Docente_model');
        $this->load->model('Academia_model'); 
        $this->load->model('Academia_miembros_model');
        $this->load->model('Carga_model');
        $this->load->model('Docente_categoria_model');
        $this->load->model('Cuerpo_academico_miembros_model'); 
        $this->load->model('Docente_formacion_model');

        $respuesta = $this->Docente_model->select_where_docente_id($doc_id);
        $academias = $this->Academia_model->select_where_academia($doc_id);
        $acamiembros = $this->Academia_miembros_model->select_where_academiamiembros($doc_id);
        $cargas = $this->Carga_model->select_where_carga_id($doc_id);
        $cmiembros = $this->Cuerpo_academico_miembros_model->select_where_cuerpomiembros_id($doc_id);
        $categorias = $this->Docente_categoria_model->select_where_docente_categoriaid($doc_id);
        $formaciones = $this->Docente_formacion_model->select_docente_formacion_doc_id($doc_id);

        $data = array('doctrayectoria' => $respuesta,
                    'academia'=> $academias,
                    'acamiembro' => $acamiembros,
                    'carga' => $cargas,
                    'cmiembro' => $cmiembros,
                    'categoria' => $categorias,
                    'formacion' => $formaciones
                );
        $this->html2pdf->html(utf8_decode( $this->load->view('cac/doctrayectoria', $data,true)));
         if ($this->html2pdf->create('save')) {
                $this->mostrar($nombreArchivo);
        	}
	}

    private function crearDirectorio()
    {
    	if (!is_dir('./download')) {
    		mkdir('./download', 0777);
    	}
    }

    public function mostrar($archivo)
    {
    	if (is_dir('./download')) {
    		if (file_exists('./download/'.$archivo)) {
    			$ruta = base_url('download/'.$archivo);
    			header('Content-type: application/pdf');
    			readfile($ruta);
    		}
    	}

    }

    
}
