<?php 
	class Users extends CI_Controller {
		public function login()
		{
			$data['title'] = 'Log In';

			$this->load->view('templates/header');
			$this->load->view('users/login', $data);
			$this->load->view('templates/footer');
		}

		public function register()
		{
			$data['title'] = 'Register';

			$this->load->view('templates/header');
			$this->load->view('users/register', $data);
			$this->load->view('templates/footer');
		}
	}