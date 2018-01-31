<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/login.css'; ?>">
<div class="panel panel-default login_panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">User Authentication</h3>
  </div>
  <div class="panel-body">
  <div class="login_logo_container">
    <img src="<?php echo ROOT_URL.'/assets/img/dragon.png'; ?>">
  </div>
  <hr>
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >
    	<div class="form-group">
    		<label>Username</label>
    		<input type="text" placeholder="Username" name="username" value="nimda" class="form-control" />
    	</div>
    	<div class="form-group">
        <label>Password</label>
        <input type="password" placeholder="Password" name="password" value="nimda" class="form-control" />
      </div>
      <a href="<?php echo URL_SIGNUP; ?>" class="btn  btn-xl pull-left">No account? Create one!</a>
      <input class="btn btn-primary btn-xl pull-right" name="signin" type="submit" value="Sign In">
    </form>
  </div>
</div>
