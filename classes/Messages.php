<?php
class Messages{
	public static function setMsg($text, $type){
		switch($type):
			case 'error':
				$_SESSION['errorMsg'] = $text;
			break;
			case 'warn':
				$_SESSION['warnMsg'] = $text;
			break;
			case 'info':
				$_SESSION['infoMsg'] = $text;
			break;
			default:
				$_SESSION['successMsg'] = $text;
		endswitch;
	}

	public static function display(){
		if(isset($_SESSION['errorMsg'])){
			?>
				<div class="alert alert-danger text-center" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Error!</strong>
					<hr>
					<?php echo $_SESSION['errorMsg'];?>
				</div>
				<!-- <script type="text/javascript">swal("Error!", "<?php echo $_SESSION['errorMsg'];?>", "error")</script> -->
			<?php
			unset($_SESSION['errorMsg']);
		}

		if(isset($_SESSION['warnMsg'])){
			?>
				<div class="alert alert-warning text-center" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Warning!</strong>
					<hr>
					<?php echo $_SESSION['warnMsg'];?>
				</div>
			<?php
			unset($_SESSION['warnMsg']);
		}

		if(isset($_SESSION['successMsg'])){
			?>
				<div class="alert alert-success text-center" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Successfull!</strong>
					<hr>
					<?php echo $_SESSION['successMsg'];?>
				</div>

			<?php
			unset($_SESSION['successMsg']);
		}

		if(isset($_SESSION['infoMsg'])){
			?>
				<div class="alert alert-success text-center" >
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					<strong>Information!</strong>
					<hr>
					<?php echo $_SESSION['infoMsg'];?>
				</div>
			<?php
			unset($_SESSION['infoMsg']);
		}
	}
}