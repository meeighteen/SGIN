<?php 
	Class Users extends CI_Controller{
		public function register(){
			if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')) {
				redirect('extras');
			}
			$data['title'] = 'Registro de Personal';
			$data['usuarios']=$this->extra_model->show_user();
			$this->form_validation->set_rules('name', 'Nombres', 'required');
			$this->form_validation->set_rules('lastname', 'Apellidos', 'required');
			$this->form_validation->set_rules('dni', 'D.N.I', 'required|callback_check_dni_exists'); 
			/*$this->form_validation->set_rules('phone', 'Celular', 'required');*/
			$this->form_validation->set_rules('email', 'Correo Electrónico', 'required|callback_check_email_exists');
			$this->form_validation->set_rules('password1', 'Contraseña', 'required');
			$this->form_validation->set_rules('password2', 'Confirmación de Contraseña', 'matches[password1]');

			if ($this->form_validation->run() ===FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/register',$data);
				$this->load->view('templates/footer');
			}else{
				$enc_password = md5($this->input->post('password1'));
				$this->user_model->register($enc_password);

				$this->session->set_flashdata('user_registered','Usuario registrado.');

				redirect('users/register');
			}
		}
		public function login(){
			if ($this->session->userdata('logged_in')) {
				redirect('/');
			}
			$data['title'] = 'Entrar al SGIN';

			$this->form_validation->set_rules('email', 'Correo Electrónico', 'required');
			$this->form_validation->set_rules('password', 'Contraseña', 'required');
			

			if ($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header');
				$this->load->view('users/login',$data);
				$this->load->view('templates/footer');
			}else{
				//Obtener correo
				$email = strtoupper($this->input->post('email'));
				//Obtener y encriptar la contraseña

				$password = md5($this->input->post('password'));
				//Entrar al SGI

				$user_id = $this->user_model->login($email, $password);
				if($user_id){
					//crear sesion
					$user_data = array(
						'nombre' => $user_id->nom_usuario,
						'user_id' => $user_id->cod_usuario,
						'email' => $email,
						'logged_in' => true,
						'is_admin' => $user_id->tipo_usuario
					);

					$this->session->set_userdata($user_data);

					//enviar respuesta
					$this->session->set_flashdata('user_loggedin','Accediste al SGIn.');
					redirect('/');
				}else{
					$this->session->set_flashdata('login_failed','Usuario y/o Contraseña incorrectos.');
					redirect('users/login');
				}
			}
		}

		public function logout(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			//cerrar sesion
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');

			$this->session->set_flashdata('user_loggedout','Saliste del SGI.');
			redirect('/');
		}


		//funcion verificar si existe el email
		function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists','Este correo ya está registrado. Por favor elija un correo nuevo.');
			if ($this->user_model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}
		//funcion verificar si existe el DNI
		function check_dni_exists($dni){
			$this->form_validation->set_message('check_dni_exists','Este DNI ya está registrado. Por favor ingrese un DNI válido.');
			if ($this->user_model->check_dni_exists($dni)) {
				return true;
			}else{
				return false;
			}
		}
	}