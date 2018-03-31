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

			$data['title'] = 'Increase the Maximum Number of Tickets in the Raffle';

			$this->form_validation->set_rules('quantity', 'Ticket Quantity', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('raffles/raffle-settings', $data);
				$this->load->view('templates/footer');
			} else {
				$amount = $this->input->post('quantity');
				$this->raffle_model->add_tickets_to_raffle($amount);

				$this->session->set_flashdata('increased_tickets', 'You have added '.$amount.' tickets to your raffle!');

				$this->load->view('templates/header');
				$this->load->view('raffles/raffle-settings', $data);
				$this->load->view('templates/footer');
			}
		}

		public function close() {
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

			$data['title'] = 'END RAFFLE AND DELETE DATA';

			$this->form_validation->set_rules('confirm_message', 'Delete Raffle Confirmation Input', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('raffles/raffle-close', $data);
				$this->load->view('templates/footer');
			} else {
				$confirm_message = $this->input->post('confirm_message');
				if(strtolower($confirm_message) === 'delete') {
					$this->raffle_model->delete_raffle_data();
					// Set some kind of message flashdata
					$this->session->set_flashdata('closed_raffle', 'You have successfully closed your raffle!');
					redirect('raffles/settings');
				} else {
					// Set some kind of message flashdata
					$this->session->set_flashdata('invalid_confirm_message', 'You entered the delete raffle confirmation input incorrectly!');
					redirect('raffles/close');
				}
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