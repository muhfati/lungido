<?php
Class Wilayas extends CI_Controller{
	
	public function index(){
		
		$this->load->view('layouts/header');
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/footer');

		
		
	}
}



?>