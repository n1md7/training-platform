<?php
class xss extends Controller{
	/*
		private function check authentication
	*/
	private function isloggedin(){
		if(!isset($_SESSION["logged_in"]))
			return false;
		else
			return true;
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
		protected function for stored xss #1 easy level
	*/
	protected function stored(){
		$this->restrictview();
		$viewmodel = new xssModel();
		$this->returnView($viewmodel->stored($_GET['level']), true);

	}

}

