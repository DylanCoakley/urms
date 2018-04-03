<?php 
	class Users extends CI_Controller {
		
		// User registration 
		public function register()
		{
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.Email]|valid_email', array('is_unique' => 'This email already exists in our records.', 'valid_email' => 'This is an invalid email!'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			$raffle_data = $this->raffle_model->get_raffle();
			$data['tickets_available'] = $raffle_data['AvailableTickets'];

			// If form does not comply to rules, redisplay webpage indicating the error
			if(!$this->form_validation->run())
			{
				$this->load->view('templates/header');
				$this->load->view('users/signup', $data);//, $data);
				$this->load->view('templates/footer');
			} else {
				$password = $this->input->post('password');
				$passwordh = password_hash($password, PASSWORD_BCRYPT);
				$this->user_model->register($passwordh);

				$email = $this->input->post('email');
				$user_data = $this->user_model->get_user_by_email($email);
				$user_id = (int) $user_data['UserID'];

				$this->request_model->create_join($user_id);
				$this->request_model->create_ticket_alloc($user_id);

				$this->session->set_userdata('user_registered', 'You are now registered, please wait for your Join Request to be approved before logging in!');

				redirect('users/login');
			}
		}

		public function login()
		{
			$data['title'] = 'Log In';

			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('users/login', $data);
				$this->load->view('templates/footer');
			} 
			else {
				$email = $this->input->post('email');

				$password = $this->input->post('password');

				// Attempt log in
				$user_id = $this->user_model->login($email, $password);

				if($user_id) {

					$role = $this->user_model->get_user_raffle_role($user_id);
					if($this->user_model->check_accounttype($user_id))
					{
						$role = $this->user_model->get_user_raffle_role($user_id);

						// Create user session data
						$user_data = array(
							'user_id'   => $user_id,
							'email'     => $email,
							'role'      => $role,
							'logged_in' => true
						);

						// Set user session data
						$this->session->set_userdata($user_data);

						$this->session->set_flashdata('user_logged_in', 'You are now logged in!');

						redirect('users/home');
					}
					else {
						$this->session->set_flashdata('unapproved_login', 'Your join request has not been accepted at this time');
						redirect('users/login');
					}
				}
				else {
					// Login failed
					$this->session->set_flashdata('login_failed', 'Login is invalid!');
					redirect('users/login');
				}
			}
		}

		public function edit() {

			// Check if user is logged in before they can view
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_user($user_id);
			$data['raffle'] = $this->raffle_model->get_raffle();

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('address', 'Address', 'required');

			if(!$this->form_validation->run()){
				$this->load->view('users/account-info', $data);
			} else {
				if($this->session->userdata('role') === 'Admin') {
					$this->user_model->update_user($user_id);

					$old_max_tickets = $data['user']['AllocatedTickets'];
					$new_max_tickets = $this->input->post('tickets_allocated');

					$requested_quantity = $new_max_tickets - $old_max_tickets;
					// Attempt to reduce the number of available tickets in the raffle
					if($this->raffle_model->reduce_available_tickets($requested_quantity)) {
						// If successful, can proceed to allocate that number of tickets to user
						$this->user_model->allocate_tickets($requested_quantity, $user_id);
					}
				} else {
					// If just seller, can update their personal info
					$this->user_model->update_user($user_id);
				}
				$this->session->set_flashdata('account_updated', 'Your account information has been successfully updated!');
				redirect('users/edit');
			}
		}

		public function upgrade($user_id) {
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

			$data['title'] = 'Upgrade Seller to Administrator';
			$data['user'] = $this->user_model->get_user($user_id);
			$email = $data['user']['Email'];

			$this->form_validation->set_rules('confirm_email', 'Upgrade Seller Confirmation Input', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('users/upgrade-role', $data);
				$this->load->view('templates/footer');
			} else {
				$confirm_email = $this->input->post('confirm_email');
				if(strtolower($confirm_email) === $email) {
					$this->user_model->upgrade_to_admin($user_id);
					// Set some kind of message flashdata
					$this->session->set_flashdata('upgraded_seller', 'You have successfully upgraded '.$data['user']['UserName'].' to an administrator!');
					redirect('raffles/sellers');
				} else {
					// Set some kind of message flashdata
					$this->session->set_flashdata('invalid_upgrade_confirm_message', 'You entered the upgrade seller confirmation input incorrectly!');
					redirect('users/upgrade/'.$user_id);
				}
			}
		}

		// Reduce allocated tickets, for Sellers
		public function reduce_my_tickets() {
			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			// Next check if user is a Seller
			if($this->session->userdata('role') === 'Visitor') {
				redirect('requests/user_list');
			} elseif ($this->session->userdata('role') === 'Admin') {
				redirect('users/statistics');
			}

			$data['title'] = 'Reduce Allocated Tickets';
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_allocated_tickets($user_id);

			$this->form_validation->set_rules('reduce_quantity', 'Reduce Ticket Quantity', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('users/reduce-my-allocated-tickets', $data);
				$this->load->view('templates/footer');
			} else {
				$amount = $this->input->post('reduce_quantity');
				$this->user_model->deallocate_tickets($amount, $user_id);
				$this->session->set_flashdata('tickets_deallocated', 'You have reduced the number of allocated tickets you have by '.$amount.'!');

				redirect('users/statistics');				
			}
		}

		// Reduce allocated tickets, only for Admins
		public function reduce_tickets($user_id) {
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

			$data['title'] = 'Reduce Allocated Tickets';

			$data['user'] = $this->user_model->get_allocated_tickets($user_id);

			$this->form_validation->set_rules('reduce_quantity', 'Reduce Ticket Quantity', 'required');

			if(!$this->form_validation->run()) {
				$this->load->view('templates/header');
				$this->load->view('users/reduce-allocated-tickets', $data);
				$this->load->view('templates/footer');
			} else {
				$amount = $this->input->post('reduce_quantity');
				$this->user_model->deallocate_tickets($amount, $user_id);
				$this->session->set_flashdata('tickets_deallocated', 'You have deallocated '.$amount.' tickets from '.$data['user']['UserName']);

				redirect('raffles/sellers');				
			}
		}

		public function home() {

			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$user_id = $this->session->userdata('user_id');
			$role = $this->user_model->get_user_raffle_role($user_id);

			if($role === 'Admin') {
				$raffle_requests = $this->request_model->get_unresolved_requests();

				$num_sellers = $this->raffle_model->get_number_sellers();
				$num_tickets = $this->ticket_model->get_number_tickets();
				$num_requests = $this->request_model->get_number_requests();
				$money_raised = $this->raffle_model->get_money_raised();

				$data['requests'] = $raffle_requests;
				$data['num_sellers'] = $num_sellers;
				$data['num_tickets'] = $num_tickets;
				$data['num_requests'] = $num_requests;
				$data['money_raised'] = $money_raised;

				$this->load->view('users/admin', $data);
			} else {
				$tickets_left = $this->user_model->get_remaining_tickets($user_id);
				$tickets_sold = $this->user_model->get_tickets_sold($user_id);
				$money_user_raised = $this->raffle_model->get_money_user_raised($user_id);
				$money_raised = $this->raffle_model->get_money_raised();

				$data['tickets_left'] = sizeof($tickets_left);
				$data['tickets_sold'] = sizeof($tickets_sold);
				$data['money_user_raised'] = $money_user_raised;
				$data['money_raised'] = $money_raised;

				$requests = $this->request_model->get_user_requests($user_id);
				$data['requests'] = $requests;

				$this->load->view('users/seller', $data);
			}
		}

		public function statistics() {

			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$user_id = $this->session->userdata('user_id');
			$user = $this->user_model->get_user($user_id);

			$sold_tickets = $this->user_model->get_tickets_sold($user_id);
			$tickets_remaining = $this->user_model->get_remaining_tickets($user_id);

			$data['title'] = 'Statistics For ' . $user['UserName'];
			$data['tickets_sold'] = $sold_tickets['Sold'];
			$data['tickets_remaining'] = $tickets_remaining['AllocatedTickets'];

			$this->load->view('templates/header');
			$this->load->view('users/seller-statistics', $data);
			$this->load->view('templates/footer');
		}

		// Drop session data & redirect
		public function logout() {
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('role');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('email');

			//$this->session->set_flashdata('user_loggedout', 'You are now logged out!');
			$this->session->sess_destroy();
			$this->load->view('templates/header');
			$this->load->view('users/login');
			$this->load->view('templates/footer');
		}
	}