<?php
	class User_model extends CI_Model {

		/* User table schema
			UserID
			Name
			Address
			Phone
			Email
			Password
		*/



		public function __construct() {
			$this->load->database();
		}

		public function register($password) {
			$data = array(
				'Name' => $this->input->post('name'),
				'Address' => $this->input->post('address'),
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('email'),
				'Password' => $password
			);

			return $this->db->insert('user', $data);
		}

		public function login($email, $password) {

			// Validate login information
			$this->db->where('Email', $email);
			$this->db->where('Password', $password);
			$result = $this->db->get('user');

			// Login info is valid
			if($result->num_rows() == 1) {
				$array = $result->row_array(0);
				return $array['UserID'];
			} 
			// Login info invalid
			else {
				return false;
			}
		}

	}