<?php
class pathTraversalModel extends Bmodel{

	/*
		Local File Inclusion #1 easy level
		function is vulnerable
	*/
	public function vulnerabilitie($level = null){
		$headingText = '<span class="level-title level-easy">easy</span>';
		$basic_filter = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		if( $level == 'medium'):
			$substitutions = array( 
			   '../' => '', 
			   '..\\'  => ''
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
			$headingText = '<span class="level-title level-medium">medium</span>';
		elseif($level == 'hard'):
			$substitutions = array( 
			   '../' => '', 
			   '..\\'  => '',
			   '.\\'  => '',
			   './'  => '',
			   '..'  => '',
			   '.../'  => '',
			);
			$get = array();
			foreach( $basic_filter as $key => $val):
				$get[$key] = str_replace( array_keys( $substitutions ), $substitutions, $val); 
			endforeach;
			$headingText = '<span class="level-title level-hard">hard</span>';
		else:
			$get = $basic_filter;
		endif;



		if( isset($basic_filter['read']) ):
			$readIt = file_get_contents($get['read']);
			if( $readIt ):
				return $readIt;
			endif;
			Messages::setMsg('We can\'t open '.$get['read'].' file', 'error');
			return false;
		endif;
		
		



		$file_contents = array();
		exec("ls ./LFI_Files;", $files);
		foreach ($files as $key => $value):
			array_push(
				$file_contents, 
					explode("<*>", 
						file_get_contents('./LFI_Files/'.$value), 3));
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
			'level' => $headingText
		);
	}




}