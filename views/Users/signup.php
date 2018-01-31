<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/signup.css'; ?>">
<div class="panel panel-default login_panel">
  <div class="panel-heading">
    <h3 class="panel-title text-center">User registration</h3>
  </div>
  <div class="panel-body">
    <form method="post" action="<?php $_SERVER['PHP_SELF']; ?>" >

      <div class="form-group">
        <label>Username *</label>
        <input type="text" placeholder="Username" name="username" class="form-control" required="true">
      </div>
    	<div class="form-group">
    		<label>E-mail address</label>
    		<input type="email" placeholder="E-mail" name="email" class="form-control">
    	</div>
    	<div class="form-group">
        <label>Password *</label>
        <input type="password" placeholder="Password" name="passwd" class="form-control" required="true">
      </div>

      <div class="form-group">
        <label>Re-enter Password *</label>
        <input type="password" placeholder="Password" name="repasswd" class="form-control" required="true">
      </div>

      <a href="<?php echo URL_SIGNIN; ?>" class="btn  btn-xl pull-left" tabindex="-1">Log in!</a>
      <input class="btn btn-primary btn-xl pull-right" name="signup" type="submit" value="Sign Up">
    </form>
  </div>
</div>
