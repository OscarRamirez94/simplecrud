<?php

class Welcomemodel extends CI_Model
{


public function altaCliente ($nombre,$apeido_paterno,$apeido_materno,$email,$celular)
	{
$id_ho= $this->session->userdata('id_hotel');
$idusuario= $this->session->userdata('id_usuario');
$query = $this->db->query("insert into cliente (nombre,apeido_paterno,apeido_materno,email,celular,estatus)
	VALUES('$nombre','$apeido_paterno','$apeido_materno','$email',$celular,'no')");

	}
		}
?>
