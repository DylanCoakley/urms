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
			Approved
		*/

		// Request constructor - Load database
		public function __construct() {
			$this->load->database();
		}

		// Insert a join request tuple into the databse
		public function create_join($user_id, $raffle_id = 1) {
			/*
			// First query to see if join assocaiated with specified UserID already exists
			$this->db->where('UserID', $user_id);
			$query = $this->db->get('request');

			if($query->num_rows() > 0) {
				// A request is already pending for the user
				return false;
			}
			*/

			$data = array(
				'UserID' => $user_id,
				'RaffleID' => $raffle_id,
				'Type' => 'Join'
			);

			return $this->db->insert('request', $data);
		}

		public function create_ticket_alloc($user_id, $raffle_id = 1) {

			if($this->input->post('form-request') === "request-dropdown")
			{
				$ticket_quantity = $this->input->post('ticket_quantity');
			} elseif ($this->input->post('form-request') === "reduce-dropdown") {
				$ticket_quantity = $this->input->post('ticket_quantity');
				$ticket_quantity = -$ticket_quantity;
			}

			$data = array(
				'UserID'   => $user_id,
				'RaffleID' => $raffle_id,
				'Type'     => 'Ticket_Alloc',
				'Quantity' => $ticket_quantity
			);
			
			return $this->db->insert('request', $data);
		}

		public function get_request($request_id) {
			$this->db->where('RequestID', $request_id);
			$query = $this->db->get('request');
			return $query->row_array(0);
		}

		public function get_number_requests($raffle_id = 1) {
			$query = $this->db->get('request');
			return $query->num_rows();
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

		public function get_unresolved_requests($raffle_id = 1) {
			$this->db->select('*');
			$this->db->from('request');
			$this->db->join('user', 'request.UserID = user.UserID');
			$this->db->where('request.RaffleID', $raffle_id);
			$this->db->where('Resolved', 0);
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function approve_request($request_id) {
			$update_data = array(
				'Resolved' => 1,
				'Approved' => 1
			);

			$this->db->where('RequestID', $request_id);
			$this->db->update('request', $update_data);
		}

		public function decline_request($request_id) {
			$update_data = array(
				'Resolved' => 1,
				'Approved' => 0
			);

			$this->db->where('RequestID', $request_id);
			$this->db->update('request', $update_data);
		}

		/*
		public function get_all_requests() {
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get('request');
			return $query->result_array();
		}
		*/
	}