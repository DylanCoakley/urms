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
				'UserName' => $this->input->post('name'),
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
			$result = $this->db->get('user');

			$array = $result->row_array(0);
			$hash_password = $array['Password'];
			$verify = password_verify($password, $hash_password);

			// Login info is valid
			if($result->num_rows() == 1 && $verify) {
				return $array['UserID'];
			}
			// Login info invalid
			else {
				return false;
			}
		}

		public function get_user($user_id) {
			$this->db->where('UserID', $user_id);
			$result = $this->db->get('user');
			return $result->row_array(0);
		}

		public function update_user($user_id) {
			$data = array(
				'UserName' => $this->input->post('name'),
				'Address' => $this->input->post('address'),
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('email')
			);

			$this->db->where('UserID', $user_id);
			$this->db->update('user', $data);
		}

		public function get_tickets_sold($user_id) {
			$query = $this->db->query("SELECT SUM(Sold) AS Sold FROM ticket WHERE UserID = ".$user_id);
			return $query->row_array();
		}
	}