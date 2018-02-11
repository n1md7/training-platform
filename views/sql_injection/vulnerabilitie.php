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
        <h2>Custom search field</h2>
            <div id="custom-search-input">
                <div class="input-group col-md-12">
                  <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
                      <input type="text" name="search" class="form-control input-lg" placeholder="Search here..." autofocus="" />
                      <!-- <span class="input-group-btn"> -->
                          <!-- <button class="btn btn-info btn-lg"> -->
                              <!-- <i class="glyphicon glyphicon-search"></i> -->
                          <!-- </button> -->
                      <!-- </span> -->
                  </form>
                </div>
            </div>
        </div>
  </div>


  <?php
    foreach ($viewmodel['output'] as $row) {
      echo $row['first_name'].'<br>';
    }

  ?>