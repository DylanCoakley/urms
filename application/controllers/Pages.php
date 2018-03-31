<?php
	class Pages extends CI_Controller{
		public function view($page = 'home'){
			if(file_exists(APPPATH.'views/pages/'.$page.'php')){
				show_404();
			}

			$data['title'] = ucfirst($page);

			if($page === 'home'){
				$this -> load-> view('templates/homeHeader');
			}else if ($page === 'login' || $page == 'signup' || $page == 'requestAccount'){
				$this -> load-> view('templates/header');
			}
			
			$this-> load-> view('pages/'.$page, $data);
			$this-> load-> view('templates/footer');
		}
	}