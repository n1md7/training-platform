<script type="text/javascript">$("#XSS_STORED_EASY").addClass("active");</script>
<link rel="stylesheet" href="<?php echo ROOT_URL.'assets/css/xss/stored/1.css'; ?>">
<h1>Level: <?php echo $viewmodel[1]; ?></h1>
<h2>You can add/remove our company employees from this page!</h2>
<p>
	Our employees - our greatest asset
We offer our employees demanding and challenging tasks. Boehringer Ingelheim needs employees who innovate – the future of our company depends directly on its innovative capability.

Our employees are the guarantors of this capability and our most important corporate asset. They form the core of our corporate culture as a family-owned company that lives out its responsibility and builds on mutual respect and fairness.

<br>
Responsibility for employees
Our company’s social responsibility has always been expressed in its core business and social benefits have always been an important part of the culture of the family-owned company Boehringer Ingelheim.​

The 25th jubilee of Boehringer Ingelheim in 1910During our company’s early years, founder Albert Boehringer introduced remarkably progressive and generous social measures for his employees. The first works health insurance scheme was established in 1902. A 14-day holiday with subsidised travel, graded according to years of service, was introduced in 1910. And in 1912 a company pension scheme was added for all employees after 20 years’ service.

The company pension scheme steadily expanded and now includes a company-financed pension and employee-financed, or partially employee-financed, pension.

Boehringer Ingelheim actively contributes to statutory pension insurance and private provisions; its benefits support the social system. A very special corporate culture and working environment have developed on the basis of mutual respect and fairness – values constantly fostered by Boehringer Ingelheim during its 130-year history.

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
   <?php foreach ($viewmodel[0] as $key => $value): ?>
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

