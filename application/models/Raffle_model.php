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

		public function create_raffle() {
			
		}

		public function get_raffle($raffle_id) {
			$query = $this->db->get_where('raffle', array('RaffleID' => $raffle_id));
			return $query->row_array();
		}

		// Gets all raffles
		public function get_raffles() {
			$this->db->order_by('Name');
			$query = $this->db->get('raffle');
			return $query->result_array();
		}

	}