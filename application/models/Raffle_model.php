<?php
	class Raffle_model extends CI_Model {

		/* Raffle table schema
			RaffleID
			Name
			StartDate
			EndDate
			MaxTickets
		*/

		public function __construct() {
			$this->load->database();
		}


	}