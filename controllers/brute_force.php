<?php
class brute_force extends Controller{
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
		if not then redirects to main page
	*/
	private function restrictview(){
		if(!$this->isloggedin()):
			header('Location: '.ROOT_URL);
			return;
		endif;
	}

	/*
		protected function for brute-force #1 easy level
	*/
	protected function vulnerabilitie(){
		$this->restrictview();
		$viewmodel = new bruteForceModel();
		$this->returnView($viewmodel->vulnerabilitie($_GET['level']), true);

	}
}

