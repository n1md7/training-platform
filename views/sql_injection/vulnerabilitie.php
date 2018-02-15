<script type="text/javascript">$("#SQL_INJECTION").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/sql_injection/style.css'; ?>">



<h1>Difficulty Level: <?php echo $viewmodel['level']['styled_name']; ?></h1>
<div class="progress">
  <div class="progress-bar <?php echo $viewmodel['level']['class']; ?> progress-bar-striped active" role="progressbar" style="width: <?php echo $viewmodel['level']['percent']; ?>%;animation:<?php echo $viewmodel['level']['css_name']; ?> 2s;">
    <?php echo $viewmodel['level']['percent']; ?>%
  </div>
</div>

<h2>Category: SQL Injection</h2>

  <div class="row">
        <div class="col-md-12">
        <h2>Customer search form</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                  <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                      <input type="text" name="search" value="<?php echo $viewmodel['post']; ?>" autocomplete="off" class="form-control input-lg" placeholder="Search here..." autofocus="" spellcheck="false" />
                  </form>
                </div>
            </div>
        </div>
  </div>
  <br>
<?php
  if(isset($viewmodel['output']) && sizeof($viewmodel['output']) != 0): ?>
    <div class="row">
      <div class="col-md-1">ID</div>
      <div class="col-md-2">First Name</div>
      <div class="col-md-2">Last Name</div>
      <div class="col-md-3">E-mail</div>
      <div class="col-md-2">Gender</div>
      <div class="col-md-2">IP</div>
    </div>
    <?php 
    foreach ($viewmodel['output'] as $row):
      vprintf("
        <div class=\"row\">
          <div class=\"col-md-1\">%s</div>
          <div class=\"col-md-2\">%s</div>
          <div class=\"col-md-2\">%s</div>
          <div class=\"col-md-3\">%s</div>
          <div class=\"col-md-2\">%s</div>
          <div class=\"col-md-2\">%s</div>
        </div>
        ", [
              $row['id'], 
              $row['first_name'], 
              $row['last_name'], 
              $row['email'], 
              $row['gender'], 
              $row['ip_address']
            ]);
    endforeach;
  else:
    if(isset($_POST['search']))
      echo "Dude, there is no any output for you!";
  endif;

?>