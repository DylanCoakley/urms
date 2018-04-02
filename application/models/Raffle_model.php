<?php
	class Raffle_model extends CI_Model {

		/* Raffle table schema
			RaffleID
			RaffleName
			Description
			StartDate
			EndDate
			AvailableTickets
			MaxTickets
		*/

		public function __construct() {
			$this->load->database();
		}

		public function create_raffle($user_id) {
			$raffle_data = array(
				'RaffleName'  => $this->input->post('name'),
				'Description' => $this->input->post('description'),
				'StartDate'   => $this->input->post('start_date'),
				'EndDate'     => $this->input->post('end_date'),
				'MaxTickets'  => $this->input->post('max_tickets')
			);

			$this->db->insert('raffle', $raffle_data);
			$raffle_id = $this->db->insert_id();

			$account_data = array(
				'RaffleID' => $raffle_id,
				'UserID'   => $user_id,
				'Role'     => "Administrator"
			);

			return $this->db->insert('accounttype', $account_data);
		}

		public function edit_raffle_info($raffle_id = 1) {
			$update_data = array(
					'RaffleName'  => $this->input->post('raffle_name'),
					'Description' => $this->input->post('description') 
			);

			$this->db->where('RaffleID', $raffle_id);
			return $this->db->update('raffle', $update_data);
		}

		public function get_raffle($raffle_id = 1) {
			$query = $this->db->get_where('raffle', array('RaffleID' => $raffle_id));
			return $query->row_array(0);
		}

		public function get_sellers($raffle_id = 1) {
			$this->db->select('*');
			$this->db->from('accounttype');
			$this->db->join('user', 'accounttype.UserID = user.UserID');
			$this->db->where('accounttype.RaffleID', $raffle_id);
			$this->db->where('Role', 'Seller');
			$this->db->or_where('Role', 'Admin');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_all_tickets($raffle_id = 1) {
			$this->db->where('RaffleID', $raffle_id);
			$query = $this->db->get('ticket');
			return $query->result_array();
		}

		public function reduce_available_tickets($amount, $raffle_id = 1) {
			$raffle_data = $this->get_raffle($raffle_id);
			$available_tickets = $raffle_data['AvailableTickets'];

			if($amount <= $available_tickets) {
				$update_data = array(
					'AvailableTickets' => $available_tickets - $amount 
				);

				$this->db->where('RaffleID', $raffle_id);
				return $this->db->update('raffle', $update_data);
			} else {
				return false;
			}
		}

		public function add_tickets_to_raffle($amount, $raffle_id = 1) {
			$raffle_data = $this->get_raffle($raffle_id);
			$available_tickets = $raffle_data['AvailableTickets'];
			$max_tickets = $raffle_data['MaxTickets'];

			$update_data = array(
					'AvailableTickets' => $available_tickets + $amount,
					'MaxTickets'       => $max_tickets + $amount
			);

			$this->db->where('RaffleID', $raffle_id);
			return $this->db->update('raffle', $update_data);
		}

		public function delete_raffle_data($raffle_id = 1) {
			// Delete all request data for the raffle
			$this->db->where('RaffleID', $raffle_id);
			$this->db->delete('request');

			// Delete all sellers from raffle
			$this->db->where('RaffleID', $raffle_id);
			$this->db->where('Role', 'Seller');
			$this->db->delete('accounttype');

			// Delete all ticket data from raffle
			$this->db->where('RaffleID', $raffle_id);
			$this->db->delete('ticket');

			return true;
		}

		/*
			$this->db->select('*'); or ->select('title, content, date')
			$this->db->from('blogs');
			$this->db->join('comments', 'comments.id = blogs.id');
			$this->db->where('name', $name);
			$this->db->where('title', $title);
			$query = $this->db->get();

		*/
			/*
		public function get_user_raffles($user_id) {
			$this->db->select('*');
			$this->db->from('raffle');
			$this->db->join('accounttype', 'raffle.RaffleID = accounttype.RaffleID');
			$this->db->where('UserID', $user_id);
			$query = $this->db->get();

			return $query->result_array();
		}

		// Gets all raffles
		public function get_raffles() {
			$this->db->order_by('RaffleName');
			$query = $this->db->get('raffle');
			return $query->result_array();
		}
		*/

	}