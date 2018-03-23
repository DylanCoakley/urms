<?php
	class Raffles extends CI_Controller {

		// View list of all ongoing raffles
		public function index() {

			// First check if logged in
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'List of Raffles';

			$data['raffles'] = $this->raffle_model->get_raffles();

			$this->load->view('templates/header');
			$this->load->view('raffles/index', $data);
			$this->load->view('templates/footer');
		}

		// View specific Raffle information
		public function view($raffle_id) {

			// First check if logged in
			if(!$this->session->userdata('logged_in'))
			{
				redirect('users/login');
			}

			$data['title'] = 'Raffle';

			$data['raffle'] = $this->raffle_model->get_raffle($raffle_id);

			$this->load->view('templates/header');
			$this->load->view('raffles/view', $data);
			$this->load->view('templates/footer');
		}

		public function create() {
			
		}
	}