
<!DOCTYPE html>
<html>
<head>
	<title>Training Platform</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link rel="stylesheet" class="link" href="<?php echo ROOT_URL.'assets/bootstrap/css/bootstrap.min.css'; ?>"> -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
	<link rel="stylesheet" class="link" href="<?php echo ROOT_URL.'assets/css/main.css'; ?>">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
</head>

<body>

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
        <a class="navbar-brand" class="link" href="<?php echo ROOT_URL; ?>"></a>
      </div>
    <?php if(isset($_SESSION['logged_in'])): ?>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="dropdown" id="PATH_TRAVERSIAL_EASY">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Path Traversal <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class=""><a class="link" href="<?php echo URL_PATH_TRAVERSAL_EASY_1; ?>">Path Traversal#1 - easy</a></li>
              <li class=""><a class="link" href="<?php echo URL_PATH_TRAVERSAL_MEDIUM_1; ?>">Path Traversal#1 - medium</a></li>
              <li class=""><a class="link" href="<?php echo URL_PATH_TRAVERSAL_HARD_1; ?>">Path Traversal#1 - hard</a></li>
              <li class=""><a class="link" href="<?php echo URL_PATH_TRAVERSAL_SUPERHARD_1; ?>">Path Traversal#1 - super-hard</a></li>
              <li class=""><a class="link" href="<?php echo URL_PATH_TRAVERSAL_IMPOSSIBLE_1; ?>">Path Traversal#1 - impossible</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Reflected#1 - easy</a></li>
              <li><a href="#">Reflected#2 - easy</a></li>
              <li><a href="#">Reflected#3 - medium</a></li>
              <li><a href="#">Reflected#4 - medium</a></li>
            </ul>
          </li>

          <li class="dropdown" id="XSS_STORED_EASY">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">XSS <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li class=""><a class="link" href="<?php echo URL_XSS_STORED_EASY_1; ?>">Stored#1 - easy</a></li>
              <li><a class="link" href="<?php echo URL_XSS_STORED_MEDIUM_1; ?>">Stored#1 - medium</a></li>
              <li><a class="link" href="<?php echo URL_XSS_STORED_HARD_1; ?>">Stored#1 - hard</a></li>
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
              <li><a href="#">LFI#1 - easy</a></li>
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
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_EASY_1; ?>">Brute-force#1 - easy</a></li>
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_MEDIUM_1; ?>">Brute-force#1 - medium</a></li>
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_HARD_1; ?>">Brute-force#1 - hard</a></li>
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_SUPER_HARD_1; ?>">Brute-force#1 - super hard</a></li>
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_EXTREMELY_HARD_1; ?>">Brute-force#1 - extremely hard</a></li>
              <li><a class="link" href="<?php echo URL_BRUTE_FORCE_IMPOSSIBLE_1; ?>">Brute-force#1 - impossible</a></li>
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
            <span class="badge badge-warning"><span class="glyphicon glyphicon-warning-sign"></span> !connected</span>
          </a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a class="link" href="<?php echo URL_USERINFO; ?>">My info</a></li>
              <li><a class="link" href="<?php echo URL_SETTINGS; ?>">Settings</a></li>
             <!--  <li><a class="link" href="<?php echo URL_SIGNUP; ?>">Sign up</a></li> -->
              <li role="separator" class="divider"></li>
              <li><a class="link" href="<?php echo URL_SIGNOUT; ?>">Sign out</a></li>
            </ul>
          </li>
        </ul>
      </div><!-- /.navbar-collapse -->
      <?php endif; ?>
    </div><!-- /.container-fluid -->
  </nav>
<!-- nav end -->




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

  <script type="text/javascript">
/*
  creating Spinner before loading new page
  image dimansions 200x200
*/
  function Spinner(self = this){
    this.create = function(){
      this.img = new Image()
      this.img.style.setProperty('display','none')
      this.img.src = "<?php echo ROOT_URL.'';?>/assets/img/loading.gif"
      this.img.onload = loadImage
      this.img.onerror = function(){
        console.warn("ERROR: Couldn't download " + self.img.src)
      }
      return this
  }
  var loadImage = function(){
    var doc = document, imgDim = [200, 200]
    doc.body.style.overflow = 'hidden'
    var style, appendStyle = '', styleImg, appendStyleImg = ''
    self.transparentDiv = doc.createElement('div')
    self.transparentImg = doc.createElement('img')
    style = {
      position : 'fixed', width : '100%', height : '100%',
      top : 0, left : 0, 'z-index' : 99999,
      'background-color' : 'rgba(0,0,0,0.4)'
    }
    styleImg = {
      top : (window.innerHeight - imgDim[0]) / 2 + 'px',
      left : (window.innerWidth - imgDim[1]) / 2 + 'px',
      position : 'fixed', 'z-index' : 999999
    }
    for(s in style){ appendStyle += s + ':' + style[s] + ';'}
    for(s in styleImg){ appendStyleImg += s + ':' + styleImg[s] + ';'}
    self.transparentImg.src = self.img.src
    self.transparentDiv.setAttribute('style', appendStyle)
    self.transparentImg.setAttribute('style', appendStyleImg)
    doc.body.appendChild(self.transparentDiv)
    doc.body.appendChild(self.transparentImg)
  }
  this.hide = function(){
    document.body.removeChild(this.transparentImg)
    document.body.removeChild(this.transparentDiv)
    document.body.style.overflow = 'auto'
  }
  this.show = function(){
    this.img.setProperty('display','block')
  }
}


document.querySelectorAll('li a.link').forEach(x => x.onclick = () => {var showSpinner = new Spinner().create()})
document.querySelectorAll('input[type=submit]').forEach(x => x.onclick = () => {var showSpinner = new Spinner().create()})


</script>
</body>
</html>
