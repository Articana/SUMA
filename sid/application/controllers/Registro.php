<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro  extends CI_Controller {

	public function index()
	{
		$this->load->model('Carrera_model');
		$carreras = $this->Carrera_model->select_carrera(); 
		$combos = array('carreras' => $carreras); 
		$this->load->view('registrodoc',$combos);
	}
	
	public function docente()
	{
	    $this->form_validation->set_rules('doc_nombres', 'Nombre(s)', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_paterno', 'Paterno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_materno', 'Materno', 'required|min_length[3]|max_length[32]');
        $this->form_validation->set_rules('doc_fechanac', 'Fecha Nac', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('doc_fechain', 'Fecha Inicio', 'required|min_length[10]|max_length[10]');
        $this->form_validation->set_rules('doc_numemp', 'Num. Empleado', 'required|min_length[1]|max_length[4]|integer');
        $this->form_validation->set_rules('doc_explab', 'Exp. Lab', 'required|min_length[1]|max_length[2]|integer');
        $this->form_validation->set_rules('doc_estatus', 'Estatus', 'required|min_length[1]|max_length[2]|integer');
        $this->form_validation->set_rules('con_emailparti', 'Correo Particular', 'required|min_length[10]|max_length[48]|valid_email');
        $this->form_validation->set_rules('con_emailinsti', 'Correo Institucional', 'required|min_length[10]|max_length[48]|valid_email'); 
        $this->form_validation->set_rules('con_teleinsti', 'Teléfono Institucional', 'min_length[7]|max_length[10]|integer'); 
        $this->form_validation->set_rules('con_teleparti', 'Teléfono Particular', 'required|min_length[7]|max_length[10]|integer'); 

	    if ( $this->form_validation->run() == FALSE ) {
            $this->session->set_flashdata('validation_errors', validation_errors());
            redirect(base_url('registro'));
        } else {
            // reCAPTCHA
		    $recaptcha = $_POST["g-recaptcha-response"];
		    $url = 'https://www.google.com/recaptcha/api/siteverify';
		    $data = array('secret' => '6LcWPb4aAAAAAJxd4EKOa2JyMdLW-ckY-e8-sXtU', 'response' => $recaptcha);
		    $options = array('http' => array ('method' => 'POST', 'content' => http_build_query($data)));
	        $context  = stream_context_create($options);
	        $verify = file_get_contents($url, false, $context);
	        $captcha_success = json_decode($verify);
	        
	        if ($captcha_success->success) {
            // OK
                $this->load->model('Docente_model');
    	        $docs= $this->Docente_model->select_where_empleado($this->input->post('doc_numemp'));
    
                if($docs == FALSE){
                    $r = $docs;
                    $this->load->model('Carrera_model');
                    $carreras = $this->Carrera_model->select_carrera(); 
    
                    $combos = array('carreras' => $carreras); 
    
                    $infodocente['doc_nombres'] = mb_strtoupper($this->input->post('doc_nombres'));
                    $infodocente['doc_paterno'] = mb_strtoupper($this->input->post('doc_paterno'));
                    $infodocente['doc_materno'] = mb_strtoupper($this->input->post('doc_materno'));
                    $infodocente['doc_fechanac'] =$this->input->post('doc_fechanac');
                    $infodocente['doc_fechain'] = $this->input->post('doc_fechain');
                    $infodocente['doc_numemp'] = $this->input->post('doc_numemp');
                    $infodocente['doc_fotografia'] =$infodocente['doc_numemp'].'.jpg';
                    $infodocente['doc_explab'] = $this->input->post('doc_explab');
                    $infodocente['doc_estatus'] = $this->input->post('doc_estatus');
                    $infodocente['carr_id'] = $this->input->post('carr_id');
                    $infocontacto['con_emailparti'] = $this->input->post('con_emailparti');
                    $infocontacto['con_emailinsti'] = $this->input->post('con_emailinsti');
                    $infocontacto['con_teleparti'] = $this->input->post('con_teleparti');
                    $infocontacto['con_teleinsti'] = $this->input->post('con_teleinsti');
    
                    $infodocente['doc_cvdir'] = md5($infodocente['doc_fechanac'] . $infodocente['doc_numemp']);
    
                    $usuario['usu_nombre'] = 'UTDC' . $infodocente['doc_numemp'];
                    $usuario['usu_contrasena'] = substr(md5($usuario['usu_nombre']), 0, 8);
                    $usuario['usu_permiso'] = '1';
    
                    $respuesta = $this->Docente_model->insert_docente($infodocente, $infocontacto, $usuario);
                    $file = $infodocente['doc_fotografia'];
                    $dir = $infodocente['doc_cvdir'];
    
                    if (!is_dir('./upload/' . $dir)) {
                        mkdir('./upload/' . $dir);
                    }
    
                    // Configuracion de la carga de archivos
                    $config['file_type']        = 'image/jpeg';
                    $config['file_ext']         = '.jpg';
                    $config['image_type']       = 'jpeg';
                    $config['allowed_types']    = 'jpg|jpeg';
                    $config['file_name']        = $file;
                    $config['file_ext_tolower'] = TRUE;
                    $config['max_size']         = 2048;
                    $config['overwrite']        = TRUE;
                    $config['upload_path']      = './upload/' . $dir;
    
                    $this->load->library('upload', $config);
    
                    if ( !$this->upload->do_upload('doc_fotografia') ) {
                        $this->session->set_flashdata('upload_error', $this->upload->display_errors());
                        redirect(base_url('registro/confirmado'));
                    } else {
                        $data = array('upload_data' => $this->upload->data());
                    }
                    redirect(base_url('registro/confirmado'));
                }
	        } else {
            // ROBOT
                redirect(base_url('registro/errorCaptcha'));
	        }
        }
    }

	public function confirmado()
    {
	    $this->load->view('confirma');
	}
	
	public function errorCaptcha()
	{
	    $this->load->view('error_captcha');
	}
}

