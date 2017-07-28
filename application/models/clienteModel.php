<?php

class clienteModel extends CI_Model
{
public function agregarCliente(){
	$field = array(
			'nombre'=>$this->input->post('nombre'),
			'apeido_paterno'=>$this->input->post('apeido_paterno'),

			'apeido_materno'=>$this->input->post('apeido_materno'),

			'celular'=>$this->input->post('celular'),

			'email'=>$this->input->post('email'),
			'estatus'=>$this->input->post('estatus')
			);
		$this->db->insert('cliente', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
		}
	public function mostrarClientes(){
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return false;
		}
	}
	public function editCliente(){
		$id_cliente	= $this->input->get('id_cliente');
		$this->db->where('id_cliente', $id_cliente);
		$query = $this->db->get('cliente');
		if($query->num_rows() > 0){
			return $query->row();
		}else{
			return false;
		}
	}

	public function modificarCliente(){
		$id_cliente = $this->input->post('id_cliente');
		$field = array(
		'nombre'=>$this->input->post('nombre'),
		'apeido_paterno'=>$this->input->post('apeido_paterno'),
		'apeido_materno'=>$this->input->post('apeido_materno'),
		'email'=>$this->input->post('email'),
		'celular'=>$this->input->post('celular'),
		'estatus'=>date('estatus')
		);
		$this->db->where('id_cliente', $id_cliente);
		$this->db->update('cliente', $field);
		if($this->db->affected_rows() > 0){
			return true;
		}else{
			return false;
		}
	}
	function eliminarCliente(){
	$id_cliente = $this->input->post('id_cliente');
	$this->db->where('id_cliente', $id_cliente);
	$this->db->delete('cliente');
	if($this->db->affected_rows() > 0){
		return true;
	}else{
		return false;
	}
}

		}
?>
