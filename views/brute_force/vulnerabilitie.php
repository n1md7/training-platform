<script type="text/javascript">$("#BRUTE_FORCE_EASY").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/brute_force/style.css'; ?>">

<h1>Difficulty Level: <?php echo $viewmodel['level']['styled_name']; ?></h1>
<div class="progress">
  <div class="progress-bar <?php echo $viewmodel['level']['class']; ?> progress-bar-striped active" role="progressbar" style="width: <?php echo $viewmodel['level']['percent']; ?>%;animation:<?php echo $viewmodel['level']['css_name']; ?> 2s;">
    <?php echo $viewmodel['level']['percent']; ?>%
  </div>
</div>

<h2>Category: Brute-force</h2>


<div class="panel panel-default login_panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">Please Login</h3>
  </div>
  <div class="panel-body">
  <div class="login_logo_container">
    <img src="<?php echo ROOT_URL.'/assets/img/dragon.png'; ?>">
  </div>
  <hr>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
    	<div class="form-group">
    		<input type="text" placeholder="Username" name="username"  class="form-control" autocomplete="off" />
    	</div>
    	<div class="form-group">
        <input type="password" placeholder="Password" name="password"  class="form-control" />
      </div>
      <input class="btn btn-primary btn-xl pull-right form-control" name="signin" type="submit" value="Sign In">
    </form>
  </div>
</div>


