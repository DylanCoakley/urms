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

		public function update_tickets($total_tickets, $user_id) {

			$this->db->where('UserID', $user_id);
			$result = $this->db->get('accounttype');
			$array = $result->row_array(0);
			$tickets_before_sale = $array['Allocated_Tickets'];

			if($tickets_before_sale < $total_tickets)
			{
				return false;
			} else {
				$data2 = array('Allocated_Tickets' => $tickets_before_sale - $total_tickets);

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

				for($i=0; $i<$total_tickets; $i++)
				{
					$this->db->insert('ticket', $data);
				}

				$this->db->where('UserID', $user_id);
				$this->db->update('accounttype', $data2);
				return true;
			}
		}
	}