<?php 
	class Users extends CI_Controller {
		

		public function register()
		{
			$data['title'] = 'Register';

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.Email]|valid_email', array('is_unique' => 'This email already exists in our records.', 'valid_email' => 'This is an invalid email!'));
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[255]');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('templates/header');
				$this->load->view('users/register', $data);
				$this->load->view('templates/footer');
			} else {
				$password = $this->input->post('password');

				$this->user_model->register($password);

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

				echo $this->input->post('email');
				echo $this->input->post('password');
				// Attempt log in
				$user_id = $this->user_model->login($email, $password);

				if($user_id) {

					// Create user session data
					$user_data = array(
						'user_id' => $user_id,
						'email' => $email,
						'logged_in' => true
					);

					// Set user session data
					$this->session->set_userdata($user_data);

					$this->session->set_flashdata('user_logged_in', 'You are now logged in!');

					redirect('raffles/index');
				}
				else {

					// Login failed
					$this->session->set_flashdata('login_failed', 'Login is invalid!');
					redirect('users/login');
				}
			}
		}

		public function edit() {

			// First check if logged in
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Edit Account Information';
			$user_id = $this->session->userdata('user_id');
			$data['user'] = $this->user_model->get_user($user_id);

			$this->form_validation->set_rules('name', 'Name', 'trim|required');
			// Include case where email is not change, so does not have to be unique
			$this->form_validation->set_rules('email', 'Email', 'trim|required|is_unique[user.Email]|valid_email', array('is_unique' => 'This email already exists in our records.', 'valid_email' => 'This is an invalid email!'));


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

		public function logout() {
			// Drop session data & redirect
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('username');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out!');
			redirect('users/login');
		}
	}