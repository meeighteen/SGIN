<?php 
	class Pages extends CI_Controller
	{
		public function view($page='welcome'){
			if (!file_exists(APPPATH.'/views/pages/'.$page.'.php')) {
				show_404();
			}
			if($this->session->userdata('logged_in')){
				$data['usuario']=$this->session->userdata('nombre');
			}else{
				$data['usuario']='';
			}
			$data['title']=ucfirst($page);
			$this->load->view('templates/header');
			$this->load->view('pages/'.$page,$data);
			$this->load->view('templates/footer');
		}
	}