<?php
class xss extends Controller{
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
		protected function for stored xss #1 easy level
	*/
	protected function stored(){
		$this->restrictview();
		$viewmodel = new xssModel();
		$level = isset($_GET['level'])?$_GET['level']:null;
		$this->returnView($viewmodel->stored($level), true);

	}

}

