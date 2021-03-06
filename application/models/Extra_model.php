<?php
	class Extra_model extends CI_Model
	{	
		public function insert_nequipo($tequipo){
			$data=array(
				'tipo_equipo' => $tequipo
			); 
			return $this->db->insert('tipo_equipo',$data);

		}
		public function insert_nubicacion($ubic){
			$data=array(
				'ubicacion' => $ubic
			); 
			return $this->db->insert('ubicacion',$data);

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
		public function actualizarEquipo($id,$data){
				$this->db->where('id_tipo_equipo',$id);
			$this->db->update('tipo_equipo',$data);
		}
		public function obtenerUbicacion($id){
			$this->db->where('id_ubicacion',$id);
			$query=$this->db->get('ubicacion');
			if($query->num_rows() > 0){
				return $query;
			}else{
				return false;
			}
		}
		public function actualizarUbicacion($id,$data){
				$this->db->where('id_ubicacion',$id);
			$this->db->update('ubicacion',$data);
		}
		public function show_tequipos(){
			$query=$this->db->get("tipo_equipo");
			return $query;			
		}
		public function show_ubicacion(){
			$query=$this->db->get("ubicacion");
			return $query;			
		}
		public function show_user(){
			$query=$this->db->get("usuario");
			return $query;		
		}

		//--------------------------------------------------------------------------

		public function check_tequipo_exists($data){
			$query=$this->db->get_where('tipo_equipo',$arrayName = array('tipo_equipo' => $data ));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}	
		public function check_ubicacion_exists($data){
			$query=$this->db->get_where('ubicacion',$arrayName = array('ubicacion' => $data ));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}	
	}