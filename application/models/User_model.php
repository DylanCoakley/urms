<?php
	class User_model extends CI_Model {

		/* User table schema
			UserID
			UserName
			Address
			Phone
			Email
			Password
		*/

		public function __construct() {

			$this->load->database();
		}

		// Create a new user record in the database from information given in form
		public function register($password) {
			$data = array(
				'UserName' => $this->input->post('name'),
				'Address'  => $this->input->post('address'),
				'Phone'    => $this->input->post('phone'),
				'Email'    => $this->input->post('email'),
				'Password' => $password
			);

			return $this->db->insert('user', $data);
		}

		// Attempt to login a user given a username and password indicated in the form
		public function login($email, $password) {

			// Only dealing with 12 Draws currently, with RaffleID = 1
			$raffle_id = 1;

			// Find the corresponding record
			$this->db->where('Email', $email);
			$result = $this->db->get('user');
			$array = $result->row_array(0);

			// Verify that given password matches hashed password
			$hash_password = $array['Password'];
			$verify = password_verify($password, $hash_password);

			// Check if login info is valid, if so, return UserID 
			if($result->num_rows() === 1 && $verify) {
				return $array['UserID'];
			}
			// Login info is invalid
			else {
				return false;
			}
		}

		// Obtains the role (Visitor, Seller, Admin) of the User for a specified Raffle
		public function get_user_raffle_role($user_id, $raffle_id = 1) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('accounttype', 'accounttype.UserID = user.UserID');
			$this->db->where('user.UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			$result = $this->db->get();

			if($result->num_rows() === 1) {
				$array = $result->row_array(0);
				return $array['Role'];
			} else {
				return 'Visitor';
			}
		}

		// Get information associated with specified UserID
		public function get_user($user_id) {
			$this->db->where('UserID', $user_id);
			$result = $this->db->get('user');
			return $result->row_array(0);
		}

		// Update a users account information
		public function update_user($user_id) {
			$data = array(
				'UserName' => $this->input->post('name'),
				'Address'  => $this->input->post('address'),
				'Phone'    => $this->input->post('phone'),
				'Email'    => $this->input->post('email')
			);

			$this->db->where('UserID', $user_id);
			$this->db->update('user', $data);
		}

		// Make the indicated User a Seller for the Raffle
		public function upgrade_to_seller($user_id, $raffle_id = 1) {
			// Do we want to pre-allocate tickets?? No
			$data = array(
				'RaffleID' 		=> $raffle_id,
				'UserID'  		=> $user_id,
				'Role'    		=> 'Seller',
				'AllocatedTickets' => 0
			);

			return $this->db->insert('accounttype', $data);
		}

		// Make the indicated User a Seller for the Raffle
		public function upgrade_to_admin($user_id, $raffle_id = 1) {
			$data = array(
				'Role' => 'Admin'
			);

			$this->db->where('UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			return $this->db->update('accounttype', $data);
		}

		public function get_allocated_tickets($user_id, $raffle_id = 1) {
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('accounttype', 'user.UserID = accounttype.UserID');
			$this->db->where('user.UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			$result = $this->db->get();
			return $result->row_array(0);
		}
		
		public function allocate_tickets($amount, $user_id, $raffle_id = 1) {
			// First find how many tickets the user is already allocated
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('accounttype', 'accounttype.UserID = user.UserID');
			$this->db->where('user.UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			$result = $this->db->get();
			$array = $result->row_array(0);

			$allocated_tickets = $array['AllocatedTickets'];

			// Add the new amount to the current amount
			$update_data = array(
					'AllocatedTickets' => $allocated_tickets + $amount,
			);

			$this->db->where('UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			return $this->db->update('accounttype', $update_data);
		}

		public function deallocate_tickets($amount, $user_id, $raffle_id = 1) {
			// First find how many tickets the user is already allocated
			$this->db->select('*');
			$this->db->from('user');
			$this->db->join('accounttype', 'accounttype.UserID = user.UserID');
			$this->db->where('user.UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			$result = $this->db->get();
			$array = $result->row_array(0);

			$allocated_tickets = $array['AllocatedTickets'];

			// Subtract the new amount to the current amount
			$update_data = array(
					'AllocatedTickets' => $allocated_tickets - $amount,
			);

			$this->db->where('UserID', $user_id);
			$this->db->where('RaffleID', $raffle_id);
			return $this->db->update('accounttype', $update_data);
		}

		// Get number of tickets sold in the raffle by the specified user
		public function get_tickets_sold($user_id) {
			 //$this->db->query("SELECT SUM(Sold) AS Sold FROM ticket WHERE UserID=" . $user_id);
			$query = $this->db->select('SUM(Sold) AS Sold')
					 		  ->where('UserID', $user_id)
					 		  ->get('ticket');
			return $query->row_array();
		}

		public function get_remaining_tickets($user_id) {
			$this->db->where('UserID', $user_id);
			$result = $this->db->get('accounttype');
			return $result->row_array(0);
		}
	}