<?php
class brute_force extends Controller{
	/*
		private function check authentication
	*/
	private function isloggedin(){
		return !isset($_SESSION["logged_in"])?false:true;
	}


	/*
		private function restrict view
		checks whether user is logged in
		if not then redirects to main page
	*/
	private function restrictview(){
		if(!$this->isloggedin()):
			header('Location: '.ROOT_URL);
			Messages::setMsg('Forgot to sign in?','error');
			return;
		endif;
	}

	/*
		protected function for brute-force #1 easy level
	*/
	protected function vulnerabilitie(){
		/*
			If it is easy level then it shouldn't be protected with authentication
		*/
		isset($_GET['level']) && $_GET['level'] == 'easy'?null:$this->restrictview();
		$viewmodel = new bruteForceModel();
		$level = isset($_GET['level'])?$_GET['level']:null;
		$this->returnView($viewmodel->vulnerabilitie($level), true);

	}
}

