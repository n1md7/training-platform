<?php
class bruteForceModel extends Bmodel{

	/*
		Brute Force #1 easy level
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		
		
		return array('level' => (new Progress($level))->level(), );
	}


}


