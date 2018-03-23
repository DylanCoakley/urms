<?php
	class Raffle_model extends CI_Model {

		/* Raffle table schema
			RaffleID
			Name
			Description
			StartDate
			EndDate
			MaxTickets
		*/

		public function __construct() {
			$this->load->database();
		}

		public function create_raffle($user_id) {
			$raffle_data = array(
				'Name' => $this->input->post('name'),
				'Description' => $this->input->post('description'),
				'StartDate' => $this->input->post('start_date'),
				'EndDate' => $this->input->post('end_date'),
				'MaxTickets' => $this->input->post('max_tickets')
			);

			$this->db->insert('raffle', $raffle_data);
			$raffle_id = $this->db->insert_id();

			$account_data = array(
				'RaffleID' => $raffle_id,
				'UserID' => $user_id,
				'Role' => "Administrator"
			);

			return $this->db->insert('accounttype', $account_data);
		}

		public function get_raffle($raffle_id) {
			$query = $this->db->get_where('raffle', array('RaffleID' => $raffle_id));
			return $query->row_array();
		}

		/*
			$this->db->select('*'); or ->select('title, content, date')
			$this->db->from('blogs');
			$this->db->join('comments', 'comments.id = blogs.id');
			$this->db->where('name', $name);
			$this->db->where('title', $title);
			$query = $this->db->get();

		*/

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
			$this->db->order_by('Name');
			$query = $this->db->get('raffle');
			return $query->result_array();
		}

	}