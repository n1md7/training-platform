<?php
/**
* genereta sha1 userpassword
*/
class Generate{
	public static function sha1($sha1){
		$salt = "&(bj%n1nJ@eh~#uh";
		return sha1($salt.$sha1.$salt);
	}
}
 
