<?php
Class PagesController extends CI_Controller{
	
	public function view($page ='index'){
		
		if (!file_exists(APPPATH.'views/admin/'.$page.'.php')) {
			show_404();
		}
		elseif($page == 'index'){
			$this->load->view('layouts/login-header');
        	$this->load->view('admin/'.$page);
		}else{
			$this->load->view('layouts/header');
			$this->load->view('admin/'.$page);
			$this->load->view('layouts/footer');

		}
        

		
		
	}
}



?>