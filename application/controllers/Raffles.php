<?php
	class Raffles extends CI_Controller {

		// View specific Raffle information
		public function view() {

			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Raffle';

			$data['raffle'] = $this->raffle_model->get_raffle();

			$this->load->view('templates/header');
			$this->load->view('raffles/view', $data);
			$this->load->view('templates/footer');
		}

		public function sellers() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			// Next check if user has Admin privileges
			if($this->session->userdata('role') === 'Visitor') {
				redirect('requests/user_list');
			} elseif ($this->session->userdata('role') === 'Seller') {
				redirect('users/statistics');
			}

			$data['title'] = 'Your Sellers';

			$data['sellers'] = $this->raffle_model->get_sellers();

			$this->load->view('templates/header');
			$this->load->view('raffles/raffle-sellers', $data);
			$this->load->view('templates/footer');
		}

		public function settings() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			// Next check if user has Admin privileges
			if($this->session->userdata('role') === 'Visitor') {
				redirect('requests/user_list');
			} elseif ($this->session->userdata('role') === 'Seller') {
				redirect('users/statistics');
			}

		}

		/*
		// View list of all ongoing raffles
		public function index() {

			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'List of Raffles';

			$data['raffles'] = $this->raffle_model->get_raffles();

			$this->load->view('templates/header');
			$this->load->view('raffles/index', $data);
			$this->load->view('templates/footer');
		}
		*/

		/*
		public function home($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Raffle Homepage';

			$data['raffle'] = $this->raffle_model->get_raffle($raffle_id);

			$this->load->view('templates/header');
			$this->load->view('templates/raffle-tabs', $data);
			$this->load->view('raffles/home', $data);
			$this->load->view('templates/footer');
		}
		*/
		/*
		public function user_list() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'My Raffles';

			$user_id = $this->session->userdata('user_id');
			$data['raffles'] = $this->raffle_model->get_user_raffles($user_id);

			$this->load->view('templates/header');
			$this->load->view('raffles/account-raffles', $data);
			$this->load->view('templates/footer');
		}
		*/

		

		/*
		public function create() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Create Raffle';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('description', 'Description', 'required|min_length[20]', array('min_length' => 'Please provide a good description of your raffle!'));
			$this->form_validation->set_rules('start_date', 'Start Date', 'required');
			$this->form_validation->set_rules('end_date', 'End Date', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('raffles/create', $data);
				$this->load->view('templates/footer');
			} else {

				$raffle_name = $this->input->post('name');

				$user_id = $this->session->userdata('user_id');

				$this->raffle_model->create_raffle($user_id);

				$this->session->set_flashdata('raffle_created', 'Your raffle '.$raffle_name.' was created!');

				redirect('raffles/index');
			}
		}
		*/
		/*
		public function user_statistics($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Your Raffle Statistics';
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_user($user_id);
		}
		*/
	}