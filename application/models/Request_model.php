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

		public function create() {
			$data = array(
				//'UserID' => $this->session->
			);
		}

		public function get_requests_for_user($user_id) {
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get_where('request', array('UserID' => $user_id));
			return $query->result_array();
		}

		public function get_all_requests() {
			$this->db->order_by('RequestDate', 'DESC');
			$query = $this->db->get('request');
			return $query->result_array();
		}
	}