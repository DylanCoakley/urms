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

		public function get_tickets($raffle_id = 1) {
			$this->db->select('Name, ticket.Phone, ticket.Email, ticket.Address, UserName');
			$this->db->from('ticket');
			$this->db->join('user', 'ticket.UserID = user.UserID');
			$this->db->where('RaffleID', $raffle_id);
			$this->db->order_by('DatePurchased', 'DESC');
			$query = $this->db->get();
			return $query->result_array();
		}

		public function get_number_tickets($raffle_id = 1) {
			$this->db->select('TicketID');
			$this->db->from('ticket');
			$this->db->join('user', 'ticket.UserID = user.UserID');
			$this->db->where('RaffleID', $raffle_id);
			$query = $this->db->get();
			return $query->num_rows();
		}

		public function update_tickets($total_tickets, $user_id, $price) {

			$this->db->where('UserID', $user_id);
			$result = $this->db->get('accounttype');
			$array = $result->row_array(0);
			$tickets_before_sale = $array['AllocatedTickets'];
			$money_before_sale = $array['MoneyRaised'];

			if($tickets_before_sale < $total_tickets)
			{
				return false;
			} else {
				$data = array(
					'RaffleID' => 1,
					'UserID'   => $this->session->userdata('user_id'),
					'Name'     => $this->input->post('name'),
					'Address'  => $this->input->post('address'),
					'Phone'    => $this->input->post('phone'),
					'Email'    => $this->input->post('email'),
					'Sold'     => 1,
					'DatePurchased' => date("Y/m/d")
				);
				
				// Insert each ticket as a separate tuple in the table
				for($i = 0; $i < $total_tickets; $i++) {
					$this->db->insert('ticket', $data);
				}

				// Modify the amount of tickets the seller has left
				$data2 = array('AllocatedTickets' => $tickets_before_sale - $total_tickets,
							   'MoneyRaised' => $money_before_sale + $price);
				$this->db->where('UserID', $user_id);
				$this->db->update('accounttype', $data2);	
				return true;
			}
		}
	}