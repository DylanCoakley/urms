<?php 
	class Tickets extends CI_Controller {

		public function view() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			// Check if user has admin privileges
			if ($this->session->userdata('role') === 'Seller') {
				redirect('users/home');
			}

			$data['tickets'] = $this->ticket_model->get_tickets();

			$this->load->view('tickets/ticket-list', $data);
		}

		public function sell_tickets() {//sell($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$this->form_validation->set_rules('ticket_quantity', 'Ticket Quantity', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('phone', 'Customer Phone', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('tickets/sell-tickets');
			} else {

				$ticket_quantity = $this->input->post('ticket_quantity');
				$book_quantity = floor($ticket_quantity / 3);
				$indiv_tickets = $ticket_quantity % 3;
				$user_id = $this->session->userdata('user_id');

				if(!$this->ticket_model->update_tickets($ticket_quantity, $user_id))
				{
					$this->session->set_flashdata('invalid_sale', 'Sale of ' . $total_tickets . ' tickets failed! Insufficient tickets remaining!');
					redirect('tickets/sell_tickets');
				} else {

					$this->session->set_flashdata('ticket_sale', 'Sale of ' . $indiv_tickets . ' ticket(s) and ' . $book_quantity .' book(s) to ' . $this->input->post('name') . ' successful!');

			    	redirect('tickets/sell_tickets');
				}
			}
		}

		public function input_tickets() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			if($this->session->userdata('role') === 'Seller') {
				redirect('users/home');
			} elseif($this->session->userdata('role') !== 'Admin') {
				redirect('users/login');
			}
			
			$this->form_validation->set_rules('ticket_quantity', 'Ticket Quantity', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('phone', 'Customer Phone', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('users/admin');
			} else {

				$ticket_quantity = $this->input->post('ticket_quantity');
				$book_quantity = floor($ticket_quantity / 3);
				$indiv_tickets = $ticket_quantity % 3;
				$user_id = $this->session->userdata('user_id');

				if(!$this->ticket_model->update_tickets($ticket_quantity, $user_id))
				{
					$this->session->set_flashdata('invalid_sale', 'Sale of ' . $total_tickets . ' tickets failed! Insufficient tickets remaining!');
					redirect('users/home');
				} else {

					$this->session->set_flashdata('ticket_sale', 'Sale of ' . $indiv_tickets . ' ticket(s) and ' . $book_quantity .' book(s) to ' . $this->input->post('name') . ' successful!');

			    	redirect('users/home');
				}
			}
		}
	}