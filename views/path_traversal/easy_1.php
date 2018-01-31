<script type="text/javascript">$("#PATH_TRAVERSIAL_EASY").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/path_traversal/easy_1.css'; ?>">

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
		<a href='%s'>back</a>
		<h2>Below is content of desired file</h2>
		<pre>%s</pre>
		", URL_PATH_TRAVERSAL_EASY_1, $text);
	// echo "<a href='".URL_PATH_TRAVERSAL_EASY_1."'>back</a>";
	// echo "<h2>Below is content of desired file</h2>";
	// echo "<pre>{$text}</pre>";
endif;
?>

<?php if( is_array($viewmodel)): ?>
	<h3>Free eBooks for Life!
Discover all-new, rising authors. Independent writers offer both entertaining fiction/romance for your enjoyment and non-fiction to help you find info from self-help to biz growth.



</h3>
<p>
	Dear Readers,

For nearly 18 years now we’ve been online sharing free eBooks with MILLIONS around the world. We’re a dedicated group of book lovers, like you, but have a very small team that has to sustain the huge costs of running our very popular site WITHOUT the deep pockets of the big names. This is why we are asking for a bit of help today. If we’ve brought value to you, please consider joining our V.I.P. level - you’ll enjoy UNLIMITED Book & AUDIObook downloads, formats compatible for all devices, priority support AND you’ll be helping millions worldwide with access to literature! Thank you in advance for your kindness.
</p>
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
		        <p><a href="<?php echo URL_PATH_TRAVERSAL_EASY_1.'&read='.'./LFI_Files/'.$value; ?>" class="btn btn-primary" role="button">Read more</a></p>
		      </div>
		    </div>
		  </div>
		<?php if(($key+1)%3==0): ?>
	</div>
		<?php endif; ?>
	<?php endforeach; ?>
<?php endif; ?>