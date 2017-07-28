<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
  $this->load->model('clienteModel');
  }
  public function index()
    {
      $this->load->view('clienteView');

    }
    public function agregarCliente(){
      $result = $this->clienteModel->agregarCliente();
  		$msg['success'] = false;
  		$msg['type'] = 'add';
  		if($result){
  			$msg['success'] = true;
  		}
  		echo json_encode($msg);
  	}

    public function mostrarClientes(){

  		$result = $this->clienteModel->mostrarClientes();
  		echo json_encode($result);
  	}
    public function editCliente(){
  		$result = $this->clienteModel->editCliente();
  		echo json_encode($result);
  	}

  	public function modificarCliente(){
  		$result = $this->clienteModel->modificarCliente();
  		$msg['success'] = false;
  		$msg['type'] = 'update';
  		if($result){
  			$msg['success'] = true;
  		}
  		echo json_encode($msg);
  	}
    public function eliminarCliente(){
    		$result = $this->clienteModel->eliminarCliente();
    		$msg['success'] = false;
    		if($result){
    			$msg['success'] = true;
    		}
    		echo json_encode($msg);
    	}

}
?>
