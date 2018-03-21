<?php 
	class Users extends CI_Controller {
		

		public function register()
		{
			$data['title'] = 'Register';

			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}

		public function login()
		{
			$data['title'] = 'Log In';

			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');

			// Login validation & store session data & redirect to raffle view
		}

		public function logout() {
			// Drop session data & redirect
		}
	}