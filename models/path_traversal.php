<?php
class pathTraversalModel extends Bmodel{

	/*
		Local File Inclusion #1 easy level
		function is vulnerable
	*/
	public function easy_1(){

		if( isset($_GET['read']) ):
			$readIt = file_get_contents($_GET['read']);
			if( $readIt ):
				return $readIt;
			endif;
			Messages::setMsg('We can\'t open '.$_GET['read'].' file', 'error');
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
		);
	}




}