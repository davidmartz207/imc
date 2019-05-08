<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        //si no está logueado redirigimos a login
        if(!is_logged_in()){
            $this->load->view('login/header');
            $this->load->view('login/login');
            $this->load->view('login/footer');

        //si está logueado redirigimos a la pagina interna
        }else{
            $this->load->view('medida/header');
    		$this->load->view('medida/index');
            $this->load->view('medida/footer');

        }

	}

    public function register()
	{
        $this->load->view('login/header');
		$this->load->view('login/register');
        $this->load->view('login/footer');
    }
    
    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nombre', 'nombre', 'required');
        $this->form_validation->set_rules('apellido', 'apellido', 'required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('password', 'password', 'required|matches[password]');


		
        if ($this->form_validation->run() === FALSE)
        {
            //retornamos resultados en formato json
		    return $this->output
            ->set_content_type('application/json')
            ->set_status_header(200)
            ->set_output(json_encode(['message'=>'No se pudo realizar el registro']));

        }
        else
        {
            $this->login_model->create();
        }
	}
	
    public function login()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
		$this->load->library('session');

        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');


		
        if ($this->form_validation->run() === FALSE)
        {
            return false;
        }
        else
        {
			
			$this->login_model->login();
			
        }
    }

    public function cerrar()
    {
			
			$this->login_model->logout();
			
        
    }
}