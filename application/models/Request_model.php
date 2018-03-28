<?php
	class Request_model extends CI_Model {

		/* Request table schema
			RequestID
			UserID
			Type
			Quantity
			Note
			RequestDate
			Resolved
		*/

		// Request constructor - Load database
		public function __construct() {
			$this->load->database();
		}

		// Insert a join request tuple into the databse
		public function create_join($user_id, $raffle_id) {
			$data = array(
				'UserID' => $user_id,
				'RaffleID' => $raffle_id,
				'Type' => 'Join'
			);

			return $this->db->insert('request', $data);
		}

		public function create_ticket_alloc($user_id) {
			$data = array(
				'UserID' => $user_id,
				'RaffleID' => 1,
				'Type' => 'Ticket_Alloc',
				'Quantity' => $this->input->post('ticket_quantity')
				);

			return $this->db->insert('request', $data);
		}

		public function get_user_requests($user_id) {
			$this->db->select('*');
			$this->db->from('request');
			$this->db->join('raffle', 'raffle.RaffleID = request.RaffleID');
			$this->db->where('UserID', $user_id);
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get();

			return $query->result_array();
		}

		public function get_all_requests() {
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get('request');
			return $query->result_array();
		}
	}