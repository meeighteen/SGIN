<?php 
class Report_incident extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('pdf_report');
	}
	public function index(){
		$this->load->view('reports/report_incident');
	}
}