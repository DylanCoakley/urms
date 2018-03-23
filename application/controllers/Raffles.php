<?php
	class Raffles extends CI_Controller {

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

		// View specific Raffle information
		public function view($raffle_id) {

			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Raffle';

			$data['raffle'] = $this->raffle_model->get_raffle($raffle_id);

			$this->load->view('templates/header');
			$this->load->view('raffles/view', $data);
			$this->load->view('templates/footer');
		}

		public function user_list() {
			
		}

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
	}