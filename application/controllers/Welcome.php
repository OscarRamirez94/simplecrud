<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
		{
			$this->load->view('welcome_message');
			$this->load->model('Welcomemodel');
}

		public function altaCliente(){

			$this->load->model('Welcomemodel');

			$nombre = $this->input->post('nombre');
			$apeido_paterno = $this->input->post('apeido_paterno');
			$apeido_materno = $this->input->post('apeido_materno');
			$email = $this->input->post('email');
			$celular = $this->input->post('celular');
		 	$this->Welcomemodel->altaCliente ($nombre,$apeido_paterno,$apeido_materno,$email,$celular);
		}
		public function mostrarClientes(){
			
		}
}
?>
