<?php 
	class Incidents extends CI_Controller
	{
		public function index(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['title']='Todas las incidencias';
			$data['incidents']=$this->incident_model->show_incidents();
			$data['incident']=$this->incident_model->show_incident_new();
			$data['estados']= $this->incident_model->obtenerEstado();
			$data['ubicaciones']= $this->extra_model->show_ubicacion();
			$this->load->view('templates/header');
			$this->load->view('incidents/index',$data);
			$this->load->view('templates/footer');

		}
		public function show_mantenimiento(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$id = $this->uri->segment(3);
			$data['title']='Ver mantenimientos';
			$data['mantenimientos']=$this->incident_model->show_mantenimiento($id);
			$this->load->view('templates/header');
			$this->load->view('incidents/show_mantenimiento',$data);
			$this->load->view('templates/footer');

		}

		public function registro_mantenimiento(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['title']='Registrar mantenimiento';
			$id = $this->uri->segment(3);
			$data['id_incidencia']=$id;

			$this->form_validation->set_rules('tipo_mantenimiento', 'Tipo de mantenimiento', 'required');
			$this->form_validation->set_rules('diag_tecnico', 'Diagnóstico Técnico', 'required');
			$this->form_validation->set_rules('descripcion_trabajo', 'Descripción del trabajo', 'required');
			if ($this->form_validation->run() ===FALSE) {
				$this->load->view('templates/header');
				$this->load->view('incidents/registro_mantenimiento',$data);
				$this->load->view('templates/footer');
			}else{
				$this->incident_model->insert_mantenimiento($id);
				redirect('incidents/index');
			}
		}

		public function register_incident(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$data['title']='Registrar Incidencia';
			$data['equipos']= $this->extra_model->show_tequipos();
			$data['ubicaciones']= $this->extra_model->show_ubicacion();

			$this->form_validation->set_rules('responsable', 'Responsable', 'required');
			$this->form_validation->set_rules('descripcion_problema', 'Descripción del problema', 'required');
			$this->form_validation->set_rules('descripcion_equipo', 'Descripción del equipo', 'required');
			$this->form_validation->set_rules('codigo_patrimonio', 'Codigo de patrimonio', 'required|callback_check_codpatrimonio_exists');
			if ($this->form_validation->run() ===FALSE) {
				$this->load->view('templates/header');
				$this->load->view('incidents/register_incident',$data);
				$this->load->view('templates/footer');
			}else{
				$this->incident_model->insert_equipo();
				$this->incident_model->insert_incident();
				redirect('incidents/index');
			}
		}
		public function edit_incident(){
			if (!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			$id = $this->uri->segment(3);
			$obtenerIncidencia=$this->incident_model->obtenerIncidencia($id);
			if($obtenerIncidencia != FALSE){
				foreach ($obtenerIncidencia->result() as $row) {
					$id = $row->id_incidencia;
					$responsable = $row->resp_incidencia;
					$descripcion_problema = $row->desc_incidencia;
					$idUsuario = $row->cod_usuario;
					$idEquipo = $row->id_equipo;
					$fecha = $row->fecha_incidencia;
					$idEstado = $row->id_estado;
					$idUbicacion = $row->id_ubicacion;
				}
				$obtenerEquipo=$this->incident_model->obtenerEquipo($idEquipo);
				foreach ($obtenerEquipo->result() as $row1) {
					$cod_patrimonio = $row1->cod_patrimonio;
					$descripcion_equipo = $row1->des_equipo;
					$id_tipo_equipo = $row1->id_tipo_equipo;
				}
				$obtenerTipoEquipo=$this->incident_model->obtenerTipoEquipo($id_tipo_equipo);
				foreach ($obtenerTipoEquipo->result() as $row2) {
					$tipo_equipo=$row2->tipo_equipo;
				}
				$data = array(
					'id_incidencia' => $id,
					'resp_incidencia' => $responsable,
					'desc_incidencia' =>  $descripcion_problema,
					'cod_usuario' =>  $idUsuario,
					'id_equipo' =>  $idEquipo,
					'id_tipo_equipo' => $id_tipo_equipo,
					'tipo_equipo' => $tipo_equipo,
					'fecha_incidencia' =>  $fecha,
					'id_estado' =>  $idEstado,
					'id_ubicacion' =>  $idUbicacion,//cambiar para saber la ubicación, no solo el ID
					'codigo_patrimonio' => $cod_patrimonio,
					'descripcion_equipo' => $descripcion_equipo
				);
			}else{
				return FALSE;
			}
			$data['title']='Editar Incidencia';
			$data['equipos']= $this->extra_model->show_tequipos();
			$data['ubicaciones']= $this->extra_model->show_ubicacion();
			$data['estados']= $this->incident_model->obtenerEstado();
			$this->load->view('templates/header');
			$this->load->view('incidents/edit_incident',$data);
			$this->load->view('templates/footer');
		}
		public function actualizarIncidencia(){
			$id_incidencia=$this->uri->segment(3);
			//die(var_dump($id_incidencia));
			$datosIncidencia = array(
				'resp_incidencia' => $this->input->post('responsable'),
				'desc_incidencia' => $this->input->post('descripcion_problema'),
				'id_estado' => $this->input->post('select_estado'), 
				'id_ubicacion' => $this->input->post('area'), 
			);
			//die(var_dump($data));
			$this->incident_model->actualizarIncidencia($id_incidencia,$datosIncidencia);

			$id_equipo=$this->input->post('id_equipo');
			$datosEquipo = array(
				'cod_patrimonio' => $this->input->post('codigo_patrimonio'), 
				'des_equipo' => $this->input->post('descripcion_equipo'),
				'id_tipo_equipo' => $this->input->post('id_tipo_equipo'),
				'id_tipo_equipo' => $this->input->post('select_equipo')
			);
			$this->incident_model->actualizarEquipo($id_equipo,$datosEquipo);
			redirect('incidents');
		}

		public function delete_incident(){
			$id_incidencia=$this->uri->segment(3);
			$obtenerIncidencia=$this->incident_model->obtenerIncidencia($id_incidencia);
			foreach ($obtenerIncidencia->result() as $row) {
					$id_equipo = $row->id_equipo;
			}
			$this->incident_model->eliminarIncidencia($id_incidencia);
			$this->incident_model->eliminarEquipo($id_equipo);
			redirect('incidents');
		}

		public function delete_mantenimiento(){
			$id_incidencia=$this->uri->segment(3);
			$this->incident_model->eliminarMantenimiento($id_incidencia);
			redirect('incidents');
		}


		//-----------------------------------------------------------------------------------------------------------

		function check_codpatrimonio_exists($data){
			$this->form_validation->set_message('check_codpatrimonio_exists','Este código patrimonio ya está registrado.');
			if ($this->incident_model->check_codpatrimonio_exists($data)){
				return true;
			}else{
				return false;
			}
		}

	}