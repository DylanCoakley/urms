<?php 
	class Users extends CI_Controller {
		
		// User registration 
		public function register()
		{
			$data['title'] = 'Register';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|is_unique[user.Email]|valid_email', array('is_unique' => 'This email already exists in our records.', 'valid_email' => 'This is an invalid email!'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			// If form does not comply to rules, redisplay webpage indicating the error
			if(!$this->form_validation->run())
			{
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				$password = $this->input->post('password');
				$passwordh = password_hash($password, PASSWORD_BCRYPT);
				$this->user_model->register($passwordh);

				$this->session->set_userdata('user_registered', 'You are registered and can log in!');

				redirect('home');
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

					// !!!Need to redirect 'Visitor' accounts to Raffle Join Request Page instead !!!//
					// redirect('join?')

					if($this->session->userdata('role') === 'Visitor') {
						redirect('raffles/view');
					} else {
						redirect('users/statistics');
					}

					//redirect('raffles/index');
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

			$data['title'] = 'Edit Account Information';
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_user($user_id);

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			// Include case where email is not change, so does not have to be unique
			//$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.Email]|valid_email', array('is_unique' => 'This email already exists in our records.', 'valid_email' => 'This is an invalid email!'));


			if(!$this->form_validation->run()){
				$this->load->view('templates/header');
				$this->load->view('users/account-info', $data);
				$this->load->view('templates/footer');
			} else {
				$this->user_model->update_user($user_id);

				$this->session->set_flashdata('account_updated', 'Your account information has been successfully updated!');
				redirect('raffles/index');
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
			redirect('users/login');
		}
	}