<?php
  $show_csrf = false;
  switch ($viewmodel['level']['name']):
    case 'easy':
    case 'medium':
      $show_csrf = false; break;
    default:
      $show_csrf = true;
  endswitch;
?>
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
    <img src="<?php echo ROOT_URL.'/assets/img/hackme_logo.png'; ?>">
  </div>
  <hr>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
    	<div class="form-group">
    		<input type="text" placeholder="Username" name="user"  class="form-control" autocomplete="off" />
    	</div>
    	<div class="form-group">
        <input type="password" placeholder="Password" name="pass"  class="form-control" />
      </div>
      <?php if($show_csrf): ?>
        <div class="form-group">
          <input type="text" placeholder="csrf" name="csrf"  class="form-control" value="<?php echo $viewmodel['csrf']; ?>" />
        </div>
      <?php endif; ?>
      <input class="btn btn-primary btn-xl pull-right form-control" name="signin" type="submit" value="Sign In">
    </form>
  </div>
</div>


