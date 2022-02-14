<?php 
Class Logincontroller extends CI_Controller{

	public function index(){

		$this->form_validation->set_rules('username','User Name','required',
			array(
			'required' => 'You are not provide %s.'
		));

		$this->form_validation->set_rules('Password','Password','required|min_length[6]|max_length[15]',
			array(
			'required' => 'You are not provide %s.'
		));
		
		if ($this->form_validation->run() === FALSE) {
			$this->load->view('layouts/login-header');
			$this->load->view('index');
		}
		else{

			$username = $this->input->post('username');
			$enc_password = md5($this->input->post('Password'));
			$user_id = $this->users->login($username,$enc_password);

			if ($user_id) {
				$role = $user_id['roles'];
				$userid = $user_id['user_id'];
				$user_data = array(
					'user_id'  	=> $userid,
					'user_name' 	=> $username,
					'roles' 	=> $role,
					'logged_in' => true
				);
				//print_r($user_id);
				$this->session->set_userdata($user_data);
				$this->session->set_flashdata('loggedin','You are now Loggedin ');
				redirect('dashboard/');
			}else{

				$this->session->set_flashdata('login_failed','Login is Invalid ');
				redirect('login/');

			}

			
		}
		
	}

	public function logout(){
		$this->session->unset_userdata('user_id');
		$this->session->unset_userdata('user_name');
		$this->session->unset_userdata('logged_in');
		
		$this->session->unset_userdata('roles');

		redirect('login/');
	}

}




?>