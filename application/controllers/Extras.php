<?php 
	Class Extras extends CI_Controller{

		public function register_nequipo(){
			if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')) {
				redirect('extras');
			}
			$data['title']='Registrar nuevo equipo';
			$data['equipos']= $this->extra_model->show_tequipos();
			$this->form_validation->set_rules('tipo_equipo', 'Tipo de equipo', 'required|callback_check_tequipo_exists'); 

			if ($this->form_validation->run() ===FALSE) {	
				$this->load->view('templates/header');
				$this->load->view('extras/register_nequipo',$data);
				$this->load->view('templates/footer');
			}else{
				$tequipo = strtoupper($this->input->post('tipo_equipo'));
				$this->extra_model->insert_nequipo($tequipo);
				redirect('extras/register_nequipo');
			}	
		}
		public function register_nubicacion(){
			if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')) {
				redirect('extras');
			}
			$data['title']='Registrar nueva ubicación';
			$data['ubicaciones']= $this->extra_model->show_ubicacion();	
			$this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required|callback_check_ubicacion_exists'); 

			if ($this->form_validation->run() ===FALSE) {	
				$this->load->view('templates/header');
				$this->load->view('extras/register_nubicacion',$data);
				$this->load->view('templates/footer');
			}else{
				$ubic = strtoupper($this->input->post('ubicacion'));
				$this->extra_model->insert_nubicacion($ubic);
				redirect('extras/register_nubicacion');
			}	
		}
		function check_tequipo_exists($data){
			$this->form_validation->set_message('check_tequipo_exists','Este tipo de equipo ya está registrado.');
			if ($this->extra_model->check_tequipo_exists($data)) {
				return true;
			}else{
				return false;
			}
		}
		function check_ubicacion_exists($data){
			$this->form_validation->set_message('check_ubicacion_exists','Esta ubicacion ya esta registrada.');
			if ($this->extra_model->check_ubicacion_exists($data)) {
				return true;
			}else{
				return false;
			}
		}
	}