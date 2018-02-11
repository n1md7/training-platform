<?php
class pathTraversalModel extends Model{

	/*
		Local File Inclusion #1 easy level
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		$basic_filter = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$allowedPath = "LFI_Files/";

		if( $level == 'medium'):

			$substitutions = array( 
			   '../' => '', 
			   '..\\'  => ''
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;

		elseif($level == 'hard'):

			$substitutions = array( 
			   '../' => '', 
			   '..\\'  => '',
			   '.\\'  => '',
			   './'  => '',
			   '..'  => '',
			   '...\\'  => '',
			   '.../'  => ''
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;

		elseif($level == 'super-hard'):

			$substitutions = array( 
			   '../'   => '', 
			   '..\\'  => '',
			   '.\\'   => '',
			   './'    => '',
			   '..'    => '',
			   '.../'  => '',
			   '...\\'  => '',
			   '%'     => ''
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;

		elseif($level == 'impossible'):

			$substitutions = array( 
			   '%'     => '',
			   '../'   => '', 
			   '..\\'  => '',
			   '.\\'   => '',
			   './'    => '',
			   '..'    => '',
			   '.../'  => '',
			   '...\\'  => '',
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;

			if (isset($get['read'])):
				if (strpos($get['read'], $allowedPath) === false):
					Messages::setMsg('A File isn\'t in allowed path', 'error');
					return;
				endif;	
				if (substr($get['read'], -4) !== ".txt"):
					Messages::setMsg('A File doesn\'t have txt extinsion', 'error');
					return;	
				endif;
			endif;
			/*
				later i have to add reg_ex here for validation
			*/
		else:
			$get = $basic_filter;
		endif;



		if( isset($basic_filter['read']) ):
			$readIt = file_get_contents($get['read']);
			if( $readIt ):
				return $readIt;
			endif;
			Messages::setMsg('We can\'t open a file '.$get['read'], 'error');
			return false;
		endif;
		
		


		$file_contents = array();
		exec("ls ./LFI_Files;", $files);
		foreach ($files as $key => $value):
			array_push(
				$file_contents, 
					explode("<*>", 
						file_get_contents('LFI_Files/'.$value), 3));
		endforeach;

		return array(
			/* 
			   split with <*> text and 
			   generate an array 
			   1st for image
			   2nd for description
			   3rd for content
			   split max 3
			*/
			'content' => $file_contents,
			'name' => $files,
			'level' => (new Progress($level))->level()
		);
	}




}


