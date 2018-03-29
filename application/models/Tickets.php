<?php 
	class Tickets extends CI_Controller {

		public function sell_tickets() {//sell($raffle_id) {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$user_id = $this->session->userdata('user_id');

			$data['title'] = 'Sell Tickets';

			$this->form_validation->set_rules('ticket_quantity', 'Ticket Quantity', 'required');
			$this->form_validation->set_rules('book_quantity', 'Book Quantity', 'required');
			$this->form_validation->set_rules('name', 'Customer Name', 'required');
			$this->form_validation->set_rules('phone', 'Customer Phone', 'required');
			$this->form_validation->set_rules('address', 'Customer Address', 'required');
			$this->form_validation->set_rules('email', 'Customer Email', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('tickets/sell-tickets', $data);
				$this->load->view('templates/footer');
			} else {
				$ticket_quantity = $this->input->post('ticket_quantity');

				$book_quantity = $this->input->post('book_quantity');

				$total_tickets = $ticket_quantity + (3 * $book_quantity);

				if(!$this->ticket_model->update_tickets($total_tickets, $user_id))
				{
					$this->session->set_flashdata('invalid_sale', 'You dont have enough tickets for this sale');

					redirect('tickets/sell_tickets');
				} else {
					$this->session->set_flashdata('ticket_sale', 'Sale of ' . $total_tickets . ' tickets successful!');

			    	redirect('tickets/sell_tickets');
				}

				//Flashdata message needs to be changed to match others, unsure how currently

			}
		}
	}