<?php
	class Incident_model extends CI_Model{
		public function __construct() {
		    parent::__construct();
		    $this->load->database();
		}
		// REGISTRO DE INCIDENCIAS 
		//------------------------------------------------------------------------------------------------------
		public function insert_equipo(){
			$dataequipo=array(
				'des_equipo'		=> $this->input->post('descripcion_equipo'),
				'id_tipo_equipo'	=> $this->input->post('select_equipo'),
				'cod_patrimonio'	=> $this->input->post('codigo_patrimonio')
			);
			return $this->db->insert('equipo',$dataequipo);
		}
		public function insert_incident(){
			$cod_patrimonio=$this->input->post('codigo_patrimonio');

			$id_equipo = $this->db->query("SELECT id_equipo FROM equipo WHERE cod_patrimonio ='".$cod_patrimonio."'");
			$dataincidencia=array(
				'resp_incidencia' 	=> $this->input->post('responsable'),
				'desc_incidencia' 	=> $this->input->post('descripcion_problema'),
				'cod_usuario' 	  	=> $this->session->userdata('user_id'),
				'id_equipo'			=> $this->db->escape_str($id_equipo->row(0)->id_equipo),
				'id_estado'			=> "1",
				'id_ubicacion'		=> $this->input->post('area')
			);
			return $this->db->insert('incidencia',$dataincidencia);
		}
		public function actualizarIncidencia($id,$data){
			$this->db->where('id_incidencia',$id);
			$this->db->update('incidencia',$data);
		}
		public function actualizarEquipo($id,$data){
			$this->db->where('id_equipo',$id);
			$this->db->update('equipo',$data);
		}
		public function eliminarIncidencia($id){
			$this->db->where('id_incidencia',$id);
			$this->db->delete('incidencia');
		}
		public function eliminarEquipo($id){
			$this->db->where('id_equipo',$id);
			$this->db->delete('equipo');
		}
		//REGISTRO DE MANTENIMIENTOS
		//----------------------------------------------------------------------------------------------------------------------
		public function insert_mantenimiento($id){

			$dataMantenimiento=array(
				'diag_mantenimiento' 	=> $this->input->post('diag_tecnico'),
				'desc_mantenimiento'	=> $this->input->post('descripcion_trabajo'),
				'rec_mantenimiento' 	=> $this->input->post('recomendaciones'),
				'id_incidencia' 		=> $id,
				'id_tipo_mantenimiento' 	=> $this->input->post('tipo_mantenimiento'),
			);
			return $this->db->insert('mantenimiento',$dataMantenimiento);
		}
		public function actualizarMantenimiento($id,$data){
			$this->db->where('id_mantenimiento',$id);
			$this->db->update('mantenimiento',$data);
		}
		public function eliminarMantenimiento($id){
			$this->db->where('id_mantenimiento',$id);
			$this->db->delete('mantenimiento');
		}
		//------------FUNCIONES EXTRAS---------------------------------------------------------------------
		public function obtenerIncidencia($id){
			$this->db->where('id_incidencia',$id);
			$query=$this->db->get('incidencia');
			if($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
		public function obtenerMantenimiento($id){
			$this->db->where('id_mantenimiento',$id);
			$query=$this->db->get('mantenimiento');
			if($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
		public function obtenerEquipo($id){
			$this->db->where('id_equipo',$id);
			$query=$this->db->get('equipo');
			if($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
		public function obtenerTipoEquipo($id){
			$this->db->where('id_tipo_equipo',$id);
			$query=$this->db->get('tipo_equipo');
			if($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
		public function obtenerEstado(){
			$query=$this->db->get("estado");
			return $query;	
		}
		//----------------------------------------------------------------------------------------
		//-----------------validaciones-----------------------------------------------------------
		public function check_codpatrimonio_exists($data){
			$query=$this->db->get_where('equipo',$arrayName = array('cod_patrimonio' => $data ));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}	
		public function show_incidents(){
			$this->db->where('id_estado !=','1');
			$query=$this->db->get("incidencia");
			return $query;			
		}
		public function show_incident_new(){
			$this->db->where('id_estado','1');
			$query=$this->db->get("incidencia");
			return $query;			
		}
		public function show_incidents_ubi($id){
			$this->db->where('id_ubicacion',$id);
			$this->db->where('id_estado !=','1');
			$query=$this->db->get("incidencia");
			return $query;			
		}
		public function show_incident_new_ubi($id){
			$this->db->where('id_ubicacion',$id);
			$this->db->where('id_estado','1');
			$query=$this->db->get("incidencia");
			return $query;			
		}
		public function show_mantenimiento($id){
			$this->db->where('id_incidencia',$id);
			$query=$this->db->get('mantenimiento');
			return $query;
		}
		//----------------------------------------------------------------------------------------
	}