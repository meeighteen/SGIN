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
		public function edit_equipo(){
			if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')) {
				redirect('extras');
			}
			$equipo=$this->uri->segment(3);
			$obtenerEquipo=$this->incident_model->obtenerTipoEquipo($equipo);
			if($obtenerEquipo != FALSE){
				foreach ($obtenerEquipo->result() as $row) {
					$id = $row->id_tipo_equipo;
					$tipo_equipo = $row->tipo_equipo;
				}
				$data = array(
					'id_tipo_equipo' => $id,
					'tipo_equipo' => $tipo_equipo
				);
			}else{
				return FALSE;
			}
			$data['title']='Editar equipo';
			$this->load->view('templates/header');
			$this->load->view('extras/edit_equipo',$data);
			$this->load->view('templates/footer');	
		}
		public function actualizar_equipo(){
			$id_tipo_equipo=$this->uri->segment(3);
			//die(var_dump($id_incidencia));
			$datosTipoEquipo = array(
				'id_tipo_equipo' => $id_tipo_equipo,
				'tipo_equipo' => $this->input->post('tipo_equipo')
			);
			$this->form_validation->set_rules('tipo_equipo', 'Tipo equipo', 'required');
			if ($this->form_validation->run() === FALSE) {
				$datosTipoEquipo['title']='Editar equipo';
				$this->load->view('templates/header');
				$this->load->view('extras/edit_equipo',$datosTipoEquipo);
				$this->load->view('templates/footer');
			}else{
			$this->extra_model->actualizarEquipo($id_tipo_equipo,$datosTipoEquipo);
			$this->session->set_flashdata('eq_updated','equipo actualizado.');
			redirect('extras/edit_equipo/'.$id_tipo_equipo.'');
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
		public function edit_ubicacion(){
			if (!$this->session->userdata('logged_in') || !$this->session->userdata('is_admin')) {
				redirect('extras');
			}
			$ubicacion=$this->uri->segment(3);
			$obtenerUbicacion=$this->extra_model->obtenerUbicacion($ubicacion);
			if($obtenerUbicacion != FALSE){
				foreach ($obtenerUbicacion->result() as $row) {
					$id = $row->id_ubicacion;
					$ubicacion = $row->ubicacion;
				}
				$data = array(
					'id_ubicacion' => $id,
					'ubicacion' => $ubicacion
				);
			}else{
				return FALSE;
			}
			$data['title']='Editar ubicación';
			$this->load->view('templates/header');
			$this->load->view('extras/edit_ubicacion',$data);
			$this->load->view('templates/footer');	
		}
		public function actualizar_ubicacion(){
			$id_ubicacion=$this->uri->segment(3);
			//die(var_dump($id_incidencia));
			$datosUbicacion = array(
				'id_ubicacion' => $id_ubicacion,
				'ubicacion' => $this->input->post('ubicacion')
			);
			$this->form_validation->set_rules('ubicacion', 'Ubicacion', 'required');
			if ($this->form_validation->run() === FALSE) {
				$datosUbicacion['title']='Editar ubicacion';
				$this->load->view('templates/header');
				$this->load->view('extras/edit_equipo',$datosUbicacion);
				$this->load->view('templates/footer');
			}else{
			$this->extra_model->actualizarUbicacion($id_ubicacion,$datosUbicacion);
			$this->session->set_flashdata('ubi_updated','ubicación actualizado.');
			redirect('extras/edit_ubicacion/'.$id_ubicacion.'');
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