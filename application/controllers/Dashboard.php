<?php
Class Dashboard extends CI_Controller{
	public function index(){
		
		$this->load->view('layouts/admin-header',$data);
		$this->load->view('admin/dashboard');
		$this->load->view('layouts/admin-footer');
	}

}




?>