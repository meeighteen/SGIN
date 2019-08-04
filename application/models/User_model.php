<?php 
	class User_model extends CI_Model
	{
		public function register($enc_password){
			$data=array(
				'nom_usuario' =>$this->input->post('name'),
				'ape_usuario' =>$this->input->post('lastname'),
				'dni_usuario' =>$this->input->post('dni'),
				'cel_usuario' =>$this->input->post('phone'),
				'correo_usuario' =>strtoupper($this->input->post('email')),
				'pas_usuario' => $enc_password
			); 

			//Insertamos el nuevo usuario
			return $this->db->insert('usuario',$data);
		}	

		public function login($email,$password){
			//validar datos
			$this->db->where('correo_usuario',$email);
			$this->db->where('pas_usuario',$password);

			$result = $this->db->get('usuario');

			if ($result->num_rows() == 1) {

				return $result->row(0);
			}else{
				return false;
			}

		}	

		public function check_email_exists($email){
			$query=$this->db->get_where('usuario',$arrayName = array('correo_usuario' => $email ));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}
		public function check_dni_exists($dni){
			$query=$this->db->get_where('usuario',$arrayName = array('dni_usuario' => $dni ));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}
	}
