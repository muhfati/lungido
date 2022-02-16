<?php
Class Users extends CI_model{

	public function __construct(){
		$this->load->database();
	}

	public function login($username,$enc_password){

		$this->db->where('email', $username);
		$this->db->where('password', $enc_password);
		$result = $this->db->get('users');

		if ($result->num_rows() == 1) {
			return $result->row_array();
		}
		else{
			return false;
		}
		
	}

	public function create_user($enc_id,$enc_password,$picture){

			$data = array(
				'user_id'  => $enc_id,
				'email'  => $this->input->post('username'),
				'password'  => $enc_password,
				'phone'	=> $this->input->post('phone'),
				'roles'  => $this->input->post('Roles')
			);
			 

			return $this->db->insert('users',$data);

	}

	public function user_exist($email){
		$result = $this->db->get_where('staff',array('email' => $email));
		if (empty($result->row_array())) {
			return true;
		}
		else{
			return false;
		}
	}




	public function view_users($id = FALSE){

		if ($id == FALSE) {
			$this->db->select('users.user_id,users.roles,users.email,staff.phone');
			$this->db->from('users');
			$result = $this->db->get();
			return $result->result_array();
		}
			
			$this->db->select('users.user_id,users.roles,users.email,users.phone');
			$this->db->from('users');
			$this->db->where('users.user_id',$id);
			$result = $this->db->get();
			return $result->row_array();

	}

	public function update_user($enc_password,$picture){
		$data = array(
			'email' => $this->input->post('username'),
			'password'  => $enc_password,
			'roles'  => $this->input->post('Roles'),
			'phone'  => $this->input->post('phone')
		);
		$this->db->where('user_id',$this->input->post('user_id'));
		
		return $this->db->update('users',$data);
	}


	public function delete_user($id){
		$this->db->where('user_id',$id);
		$this->db->delete('users');
		return true;
	}

	public function totalusers(){

		$this->db->select('*');
		$this->db->from('users');
		$this->db->where('users.roles !=','Admin');
		return $this->db->count_all_results();
		}

	public function profile($user_id){

		$this->db->select('users.user_id,users.roles,users.email,users.phone');
		$this->db->from('users');
		$this->db->where('users.user_id',$user_id);
		$result = $this->db->get();
		return $result->row_array();
		


	}

	public function changepassword($user_id,$old_pass,$new_pass){
		$data = array(
			'password' => $new_pass

		);
		$this->db->where('users.user_id',$user_id);
		$this->db->where('users.password',$old_pass);
		return $this->db->update('users',$data);

	}

	
}



?>