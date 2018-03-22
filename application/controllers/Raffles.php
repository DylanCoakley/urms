<?php
	class Raffles extends CI_Controller {

		public function view() {

			$data['title'] = 'Raffles';

			$this->load->view('templates/header');
			$this->load->view('raffles/view', $data);
			$this->load->view('templates/footer');
		}
	}