<script type="text/javascript">$("#PATH_TRAVERSIAL_EASY").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/path_traversal/vulnerabilitie.css'; ?>">

<script>
	function imgLoading(self){
		self.parentNode.querySelector('.loading').style.display="none"
		self.style.display="block"
	}

	function errLoading(self){
		self.parentNode.querySelector('.loading').style.display="block"
		self.parentNode.querySelector('.loading').style.color="red"
		self.parentNode.querySelector('.loading').innerHTML = "Error: Couldn't load an image!"
	}
</script>
<?php 
/*
	if opening one file just display content 
	otherwise display all with raw of cards
*/
if( !is_array($viewmodel) && $viewmodel):
	$text = explode("<*>", $viewmodel,3);
	if(sizeof($text) > 1)
		$text = $text[sizeof($text) - 1];
	else
		$text = $viewmodel;

	printf("
		<a href='#' onclick='window.history.go(-1); return false;'><span class='glyphicon glyphicon-chevron-left'></span>back</a>
		<h2>Below is content of desired file</h2>
		<pre>%s</pre>
		", $text);
	// echo "<a href='".URL_PATH_TRAVERSAL_EASY_1."'>back</a>";
	// echo "<h2>Below is content of desired file</h2>";
	// echo "<pre>{$text}</pre>";
endif;
?>

<?php if( is_array($viewmodel) ): ?>
<h1>Level: <?php echo $viewmodel['level']; ?></h1>
<h2>Path Traversal</h2>
	<h3>
		A path traversal attack (also known as directory traversal) aims to access files and directories that are stored outside the web root folder. By manipulating variables that reference files with “dot-dot-slash (../)” sequences and its variations or by using absolute file paths, it may be possible to access arbitrary files and directories stored on file system including application source code or configuration and critical system files. It should be noted that access to files is limited by system operational access control (such as in the case of locked or in-use files on the Microsoft Windows operating system).

		This attack is also known as “dot-dot-slash”, “directory traversal”, “directory climbing” and “backtracking”. 
		source [<a target="_blank" href="https://www.owasp.org/index.php/Path_Traversal">OWASP <span class="glyphicon glyphicon-new-window"></span> </a>]
	</h3>
	<hr>
 

	<?php foreach ($viewmodel['name'] as $key => $value): ?>
		<?php if($key%3==0): ?>
	<div class="row">
		<?php endif; ?>
		<div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		    <p class="loading">Loading...</p>
		      <img onload="imgLoading(this)" src="<?php echo $viewmodel['content'][$key][0]; ?>" alt="<?php echo $viewmodel['content'][$key][0]; ?>" class="tumb_img" onerror="errLoading(this)">
		      <div class="caption">
		        <h3><?php echo explode(".",$value,2)[0]; ?></h3>
		        <p><?php echo $viewmodel['content'][$key][1]; ?></p>
		        <p><a href="<?php echo $_SERVER['REQUEST_URI'].'&read='.'./LFI_Files/'.$value; ?>" class="btn btn-primary" role="button">Read more</a></p>
		      </div>
		    </div>
		  </div>
		<?php if(($key+1)%3==0): ?>
	</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>