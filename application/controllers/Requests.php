<?php
	class Requests extends CI_Controller {


		public function approve($request_id) {
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

			$request = $this->request_model->get_request($request_id);

			$type = $request['Type'];
			$user_id = $request['UserID'];

			if($type === 'Join') {

				$this->user_model->upgrade_to_seller($user_id);
				$this->request_model->approve_request($request_id);

			} elseif($type === 'Ticket_Alloc') {

				$requested_quantity = $request['Quantity'];
				// Attempt to reduce the number of available tickets in the raffle
				if($this->raffle_model->reduce_available_tickets($requested_quantity)) {
					// If successful, can proceed to allocate that number of tickets to user
					$this->request_model->approve_request($request_id);
					$this->user_model->allocate_tickets($requested_quantity, $user_id);

				} else {
					$this->session->set_flashdata('insufficient_raffle_tickets', 'Your raffle does not have enough available tickets remaining to grant this request! Either decline the request or add additional tickets to the raffle.');
				}

			}

			redirect('requests/raffle_requests');
		}

		public function decline($request_id) {
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

			$this->request_model->decline_request($request_id);

			redirect('requests/raffle_requests');
		}
		
		public function join() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$user_id = $this->session->userdata('user_id');

			if($this->request_model->create_join($user_id)) {
				$this->session->set_flashdata('join_requested', 'Your request to join has been submitted!');

				redirect('requests/user_list');
			} else {
				// User already has a request pending
				$this->session->set_flashdata('duplicate_join_request', 'You already have a request to join pending!');
				redirect('requests/user_list');
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

			// Next check if user has Seller or Admin privileges
			if($this->session->userdata('role') === 'Visitor') {
				redirect('requests/user_list');
			}

			$data['title'] = 'Request Tickets';

			$user_id = $this->session->userdata('user_id');

			$this->form_validation->set_rules('ticket_quantity', 'Ticket Quantity', 'required');

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

		public function raffle_requests() {
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


			$data['title'] = 'Raffle Requests';

			$user_id = $this->session->userdata('user_id');
			$data['requests'] = $this->request_model->get_unresolved_requests();

			$this->load->view('templates/header');
			$this->load->view('requests/raffle-requests', $data);
			$this->load->view('templates/footer');


		}
	}