<!DOCTYPE html>
<html>
<head>
	<title>Traning Platform</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" href="<?php echo ROOT_URL.'assets/bootstrap/css/bootstrap.min.css'; ?>"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/main.css'; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>

<body>

<?php if($_SESSION['logged_in']): ?>
  <!-- nav start -->
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#">Nimda</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li id="PATH_TRAVERSIAL_EASY"><a href="<?php echo URL_PATH_TRAVERSAL_EASY_1; ?>">Path Traversal <span class="sr-only">(current)</span></a></li>
          <li><a href="#">RFI</a></li>
          <li class="dropdown" id="XSS_STORED_EASY">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">XSS <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class=""><a href="<?php echo URL_XSS_STORED_EASY_1; ?>">Stored#1 - easy</a></li>
              <li><a href="#">Stored#2 - easy</a></li>
              <li><a href="#">Stored#3 - medium</a></li>
              <li><a href="#">Stored#4 - medium</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Reflected#1 - easy</a></li>
              <li><a href="#">Reflected#2 - easy</a></li>
              <li><a href="#">Reflected#3 - medium</a></li>
              <li><a href="#">Reflected#4 - medium</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">SQLi <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">SQL Injection#1 - easy</a></li>
              <li><a href="#">SQL Injection#2 - easy</a></li>
              <li><a href="#">SQL Injection#3 - medium</a></li>
              <li><a href="#">SQL Injection#3 - medium</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">SQL Injection blind#1 - easy</a></li>
              <li><a href="#">SQL Injection blind#2 - easy</a></li>
              <li><a href="#">SQL Injection blind#3 - medium</a></li>
              <li><a href="#">SQL Injection blind#3 - medium</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">FI <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="3">LFI#1 - easy</a></li>
              <li><a href="#">LFI#2 - easy</a></li>
              <li><a href="#">LFI#3 - medium</a></li>
              <li><a href="#">LFI#4 - medium</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">RFI#1 - easy</a></li>
              <li><a href="#">RFI#2 - easy</a></li>
              <li><a href="#">RFI#3 - medium</a></li>
              <li><a href="#">RFI#4 - medium</a></li>
            </ul>
          </li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Brute-force <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#">#1 - easy</a></li>
              <li><a href="#">blah</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">One more separated link</a></li>
            </ul>
          </li>
        </ul>
        <!-- <form class="navbar-form navbar-left">
          <div class="form-group">
            <input type="text" class="form-control" placeholder="Search">
          </div>
          <button type="submit" class="btn btn-default">Submit</button>
        </form> -->
        <ul class="nav navbar-nav navbar-right">
          <li><a href="#" disabled="">
            <span class="badge badge-warning">!connected</span>
          </a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?php echo URL_USERINFO; ?>">My info</a></li>
              <li><a href="<?php echo URL_SETTINGS; ?>">Settings</a></li>
             <!--  <li><a href="<?php echo URL_SIGNUP; ?>">Sign up</a></li> -->
              <li role="separator" class="divider"></li>
              <li><a href="<?php echo URL_SIGNOUT; ?>">Sign out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
<!-- nav end -->
<?php endif; ?>




  <!-- <div class="container-fluid main_container"> -->
  <div class="container main_container">
    <!-- <div class="well"> -->
      <?php Messages::display(); ?>
      <?php require($view); ?>
      <!-- footer start -->

      <?php require('./views/footer.html'); ?>
      

      <!-- footer end -->
    <!-- </div> -->
  </div>
 

  <!-- <script src="<?php echo ROOT_URL.'assets/js/jquery-3.2.1.min.js'; ?>"></script> -->
  <!-- <script src="<?php echo ROOT_URL.'assets/bootstrap/js/bootstrap.min.js'; ?>"></script> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
