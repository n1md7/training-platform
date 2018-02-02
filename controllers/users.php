<?php
class Users extends Controller{
	/*
		private function check authentication
	*/
	private function isloggedin(){
		return !isset($_SESSION["logged_in"])?false:true;
	}



	/*
		private function restrict view
		checks whether user is logged in
		if not then redireccts to main page
	*/
	private function restrictview(){
		if(!$this->isloggedin()):
			header('Location: '.ROOT_URL);
			return;
		endif;
	}

	/* 
		!public function for signin
	*/
	protected function signin(){
		/* check logged in user*/
		if($this->isloggedin()):
			header('Location: '.ROOT_URL);
			return;
		endif;
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->signin(), true);
	}

	/* 
		!public function for signup
	*/
	protected function signup(){
		/* check logged in user*/
		if($this->isloggedin()):
			header('Location: '.ROOT_URL);
			return;
		endif;
		$viewmodel = new UserModel();
		$this->returnView($viewmodel->signup(), true);
	}


	/* 
		!public function for signout
	*/
	protected function signout(){
		if(isset($_SESSION['logged_in'])):
			unset($_SESSION['logged_in']);
			unset($_SESSION['user_data']);
			session_destroy();
		/*
			Redirect
		*/
			header('Location: '.URL_SIGNIN);
		endif;

		return;
	}


	/* 
		!public function for settings
	*/
	protected function settings(){
		$this->restrictview();

		$viewmodel = new UserModel();
		$this->returnView($viewmodel->settings(), true);
	}


	/* 
		!public function for userinfo
	*/
	protected function userinfo(){
		$this->restrictview();

		$viewmodel = new UserModel();
		$this->returnView($viewmodel->userinfo(), true);
	}

}
