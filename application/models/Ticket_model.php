<?php
	class Ticket_model extends CI_Model {

		/* Ticket table schema
			TicketID
			RaffleID
			UserID
			Name
			Address
			Phone
			Email
			Sold
			DatePurchased
		*/

		public function __construct() {
			$this->load->database();
		}

		public function update_tickets($total_tickets) {

			$data = array(
				'RaffleID' => 1,
				'UserID' => $this->session->userdata('user_id'),
				'Name' => $this->input->post('name'),
				'Address' => $this->input->post('address'),
				'Phone' => $this->input->post('phone'),
				'Email' => $this->input->post('email'),
				'Sold' => $total_tickets,
				'DatePurchased' => date("Y/m/d")
			);
			//Problem with tickets being stored under single IDs with simply a quantity, schema needs to be changed to accompany individual IDs for each ticket
			$this->db->insert('ticket', $data);
		}
	}