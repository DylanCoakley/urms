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
	}