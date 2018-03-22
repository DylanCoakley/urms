<?php
	class Homepage extends CI_Controller{
		public function view($page = 'home'){
			if(file_exists(APPPATH.'views/homepage/'.$page.'php')){
				show_404();
			}

			$data['title'] = ucfirst($page);

			$this -> load-> view('templates/homeHeader');
			$this-> load-> view('homepage/'.$page, $data);
			$this-> load-> view('templates/footer');
		}
	}