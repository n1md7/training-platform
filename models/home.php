<?php
class HomeModel extends Model{
	public function Index(){
		if( empty($_SESSION['user_data']["username"]) ):
			header('Location: '.URL_SIGNIN);
		endif;
		return;
	}
}
