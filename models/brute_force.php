<?php
class bruteForceModel extends Bmodel{

	/*
		Brute Force #1 easy level
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
		if( 
			isset($post['user']) &&
			isset($post['pass']) &&
			isset($post['signin'])
		):
			// $this-query('');
			// $this->bind('')
		endif;
		
		return array('level' => (new Progress($level))->level(), );
	}


}


