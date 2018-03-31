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

		public function update_tickets($ticket_quantity, $user_id) {

			$this->db->where('UserID', $user_id);
			$result = $this->db->get('accounttype');
			$array = $result->row_array(0);
			$tickets_before_sale = $array['AllocatedTickets'];

			if($tickets_before_sale < $ticket_quantity)
			{
				return false;
			} else {
				$data = array(
					'RaffleID' => 1,
					'UserID' => $this->session->userdata('user_id'),
					'Name' => $this->input->post('name'),
					'Address' => $this->input->post('address'),
					'Phone' => $this->input->post('phone'),
					'Email' => $this->input->post('email'),
					'Sold' => 1,
					'DatePurchased' => date("Y/m/d")
				);

				$data2 = array('AllocatedTickets' => $tickets_before_sale - $ticket_quantity);
				
				// Insert each ticket as a separate tuple in the table
				for($i=0; $i<$ticket_quantity; $i++)
				{
					$this->db->insert('ticket', $data);
				}
				
				// Modify the amount of tickets the seller has left
				$this->db->where('UserID', $user_id);
				$this->db->update('accounttype', $data2);
				return true;
			}
		}
	}