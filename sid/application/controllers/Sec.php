<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sec extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function isLogin()
	{
		if ($this->session->has_userdata('userid') && $this->session->has_userdata('username') && $this->session->has_userdata('permiso')) {
			$this->redirectArea();
		}
	}

	public function redirectArea()
	{
		$permiso = $this->session->userdata('permiso');
		$control = '';
		switch ($permiso) {
			case '1':
				$control = 'doc';
				break;
			case '3':
				$control = 'rec';
				break;
			case '5':
				$control = 'cac/filtro';
				break;
			case '7':
				$control = 'adm';
				break;
			case '9':
                $control = 'rh';
                break;
            case '11':
                $control = 'dire';
                break;

			default:
				$control = 'sec/invalidar';
				break;
		}
		redirect(base_url($control));
	}

	public function index()
	{
		// Validar si esta logueado
		$this->isLogin();

		$this->load->view('header.php', array('title' => 'Sistema de Información Docente | Acceso'));
		// $this->load->view('navbar_doc.php', array('current_user' => 'DOCENTE'));
		// $this->load->view('jumbotron.php');
		$this->load->view('security/acceso.php');
		$this->load->view('footer.php');
	}

	public function validar()
	{
		// Verificar cantidad de intentos de acceso

		// Validar
		$this->form_validation->set_rules('usuario', 'Usuario', 'required|trim|min_length[4]|max_length[8]|xss_clean|alpha_numeric');
		$this->form_validation->set_rules('secreto', 'Secreto', 'required|trim|min_length[4]|max_length[8]|xss_clean|alpha_numeric');

		if ($this->form_validation->run() === FALSE)
		{
			// En lugar de cargar vistas, se redirecciona y en la session se guardan los validation errors.
			/*$this->load->view('header.php', array('title' => 'Sistema Único de Mejoramiento Académico | Acceso');
			$this->load->view('security/acceso.php');
			$this->load->view('footer.php');
			*/
			$this->session->set_flashdata('validation_errors', validation_errors());
			redirect(base_url('sec'));
		}
		else
		{
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
            $usuario = $this->input->post('usuario');
			$secreto = $this->input->post('secreto');

			$this->load->model('Security_model');
			$acceso = $this->Security_model->login($usuario, $secreto);

    			if ($acceso === FALSE) {
    				$this->session->set_flashdata('access_error', 'Usuario o Secreto no valido, intenta nuevamente.');
    				redirect(base_url('sec'));
    			} else {
    				$userdata = array('userid' => $acceso[0]->usu_id, 'username'=> $acceso[0]->usu_nombre, 'permiso'=> $acceso[0]->usu_permiso);
    				$this->session->set_userdata($userdata);
    				$this->redirectArea();
    			}
            } else {
            // ROBOT
                redirect(base_url('sec'));
	        }
		}
	}

	public function invalidar()
	{
		$this->session->sess_destroy();
		redirect(base_url('sec'));
	}
}
