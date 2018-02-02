<?php
/**
* genereta sha1 userpassword
*/
class Generate{
	public static function sha1($sha1){
		$salt = "&(bj%n1nJ@eh~#uh";
		return sha1($salt.$sha1.$salt);
	}
	public static function csrf($len = 32){
		$str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
		$csrf = "";
		for($k = 0; $k < $len; $k ++)
			$csrf .= $str[ rand( 0, strlen($str) - 1 ) ];
		return $csrf;
	}
}
 
