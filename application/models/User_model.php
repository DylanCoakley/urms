<?php
	class User_model extends CI_Model {

		/* User table schema
			UserID
			Name
			Address
			Phone
			Email
			Password
		*/

		public function __construct() {
			$this->load->database();
		}

		
	}