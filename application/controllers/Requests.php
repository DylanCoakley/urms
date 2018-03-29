<?php
	class Requests extends CI_Controller {

		public function join($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$user_id = $this->session->userdata('user_id');

			if($this->request_model->create_join($user_id, $raffle_id)) {
				$this->session->set_flashdata('join_requested', 'Your request to join has been submitted');

				redirect('raffles/view/'.$raffle_id);
			} else {
				redirect('raffles/index');
			}
		}

		public function user_list() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'My Requests';

			$user_id = $this->session->userdata('user_id');
			$data['requests'] = $this->request_model->get_user_requests($user_id);

			$this->load->view('templates/header');
			$this->load->view('requests/account-requests', $data);
			$this->load->view('templates/footer');
		}

		public function request_tickets() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Request Tickets';

			$user_id = $this->session->userdata('user_id');

			$this->form_validation->set_rules('ticket_quantity', 'Ticket Quantity', 'required|callback_is_positive', array('is_positive' => 'You must indicate a positive number of tickets to request!'));

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('requests/request-tickets', $data);
				$this->load->view('templates/footer');
			} else {
				$this->request_model->create_ticket_alloc($user_id);
				$this->session->set_flashdata('tickets_requested', 'Your ticket request has been submitted');

				redirect('requests/request_tickets');
			}

		}

		public function is_positive($num) {
			return $num > 0;
		}

		public function raffle_requests($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} 
			// Check if user session contains Administrator Role
			// elseif () {
			

			$data['title'] = 'Raffle Requests';

			$data['requests'] = $this->request_model->get_raffle_requests($raffle_id);

			$this->load->view('templates/header');
			$this->load->view('requests/raffle-requests', $data);
			$this->load->view('templates/footer');


		}

	}