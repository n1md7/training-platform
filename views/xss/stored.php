<script type="text/javascript">$("#XSS_STORED_EASY").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/xss/stored/1.css'; ?>">

<h1>Difficulty Level: <?php echo $viewmodel['level']['styled_name']; ?></h1>
<div class="progress">
  <div class="progress-bar <?php echo $viewmodel['level']['class']; ?> progress-bar-striped active" role="progressbar" style="width: <?php echo $viewmodel['level']['percent']; ?>%;animation:<?php echo $viewmodel['level']['css_name']; ?> 2s;">
    <?php echo $viewmodel['level']['percent']; ?>%
  </div>
</div>

<h2>Category: Cross-site scripting</h2>

<h2>
	Cross-Site Scripting (XSS) attacks are a type of injection, in which malicious scripts are injected into otherwise benign and trusted web sites. XSS attacks occur when an attacker uses a web application to send malicious code, generally in the form of a browser side script, to a different end user. Flaws that allow these attacks to succeed are quite widespread and occur anywhere a web application uses input from a user within the output it generates without validating or encoding it.

An attacker can use XSS to send a malicious script to an unsuspecting user. The end user’s browser has no way to know that the script should not be trusted, and will execute the script. Because it thinks the script came from a trusted source, the malicious script can access any cookies, session tokens, or other sensitive information retained by the browser and used with that site. These scripts can even rewrite the content of the HTML page.
	[<a target="_blank" href="https://www.owasp.org/index.php/Cross-site_Scripting_(XSS)">OWASP <span class="glyphicon glyphicon-new-window"></span> </a>]
</h2>
<h3>You can add/remove our company employees from this page!</h3>
<p>
	


<br>
<hr>
</p>

<table class="table table-inverse">
  <thead>
    <tr>
      <th>#</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Age</th>
      <th>Action</th>
    </tr>
  </thead>
  <tbody>
   <?php foreach ($viewmodel['result'] as $key => $value): ?>
    <tr>
      <th scope="row"><?php echo $key; ?></th>
      <td><?php echo $value['fname']; ?></td>
      <td><?php echo $value['lname']; ?></td>
      <td><?php echo $value['age']; ?></td>
      <td>
      	<form method="post">
      		<input type="hidden" name="id" value="<?php echo $value['id']; ?>">
      		<input type="submit" name="delete" class="btn btn-danger delete_row" value="Delete">
      	</form>
      </td>
    </tr>
   <?php endforeach; ?>
    <tr>
	    <form method="post" action="">
	      <th scope="row"><?php echo ++$key; ?></th>
	      <td><input type="text" class="form-control" placeholder="First Name" name="fname" ></td>
	      <td><input type="text" class="form-control" placeholder="Last Name" name="lname"></td>
	      <td><input type="number" class="form-control" placeholder="Age, integer only" name="age" ></td>
	      <td><input type="submit" name="submit" class="btn btn-primary" value="Add"></td>
	    </form>	
    </tr>
  </tbody>
</table>

<div class="action_div">
	<form action="" method="post" name="del">
		<select name="amount" class="btn btn-xxl btn-default">
			<?php 
				for ($i = 1; $key >= $i; $i ++):
					echo "<option value=\"{$i}\">{$i}</option>";
				endfor;
			?>
		</select>
		<input type="submit" onsubmit="return false" name="delete" class="btn btn-danger btn-xxl" value="Delete Last 1 Record(s)">
	</form>
</div>

<h5>Web-page is developed and maintained by Nimda</h5>

<script>
	document.forms.del.delete.onclick = () => {
		if(confirm('Are you sure?')) document.forms.del.submit()
		else return false
	}

	let toReplace = '1'
	document.forms.del.elements.amount.onchange = () => {
		document.forms.del.elements.delete.value = document.forms.del.
		elements.delete.value.
		replace(toReplace, document.forms.del.elements.amount.value)
		toReplace = document.forms.del.elements.amount.value
	}

	document.querySelectorAll('.delete_row').forEach(x => x.addEventListener('mouseover',
		function(){
			for(let i = 0; i < this.parentNode.parentNode.parentNode.children.length; i ++){
				this.parentNode.parentNode.parentNode.children[i].style.setProperty('text-decoration','line-through')
				this.parentNode.parentNode.parentNode.children[i].style.setProperty('color','rgba(255,0,0,0.6)')
			}	
	}))

	document.querySelectorAll('.delete_row').forEach(x => x.addEventListener('mouseout',
		function(){
			for(let i = 0; i < this.parentNode.parentNode.parentNode.children.length; i ++){
				this.parentNode.parentNode.parentNode.children[i].style.setProperty('text-decoration','none')
				this.parentNode.parentNode.parentNode.children[i].style.setProperty('color','rgba(255,255,255,0.9)')
			}	
	}))
</script>

