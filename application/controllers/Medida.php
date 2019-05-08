<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medida extends CI_Controller {

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
		if (is_logged_in()){
			
            $this->load->view('medida/header');
    		$this->load->view('medida/index');
			$this->load->view('medida/footer');
		}else {
            $this->load->view('login/header');
            $this->load->view('login/login');
			$this->load->view('login/footer');		
		}
	}

	public function listar (){
		return	$this->medida_model->listar();

	}


	public function create (){
		return	$this->medida_model->crear();
	}
}