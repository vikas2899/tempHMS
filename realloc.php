<?php
ob_start();
define('myheader',TRUE);
require('header.php');
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">
  document.getElementById("drop").style.display = "none";
  document.getElementById("logout").style.display = "block";
  document.getElementById("menu-toggle").style.display = "none";
</script>
</head>
<body>
<div class="d-flex" id="wrapper">
      <div class="bg-light border-right" id="sidebar-wrapper" style="margin-top:-7px;">
          <div class="sidebar-heading"><?php echo "Welcome Admin"?></div>
          <div class="list-group list-group-flush">
            <a href="login_configure.php" class="list-group-item list-group-item-action bg-light" id="dash" href="student_form.php">Dashboard</a>
            <a href="manage_student.php" class="list-group-item list-group-item-action bg-light" id="alloc">Manage Student</a>
            <a href="manage_building.php" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
          	<form action="realloc.php" method="post" id="form" style="display:block;">
          		<div class="form-row">
          			<div class="form-group col-md-4">
            			<label for="srealloc">Please select the option : </label>
            				<select id="srealloc" name="realloc" class="form-control" required>
              				<option>Leave Hostel</option>
              				<option>Change Room</option>
            				</select>
          			</div>
          		</div>
				<input type="submit" value = "Next" name="submit" id="btn" class="btn btn-primary">		 
			</form>	
              
 <?php
if(isset($_POST['submit'])){
	$opinion = $_POST['realloc'];
	?>
	<script type="text/javascript">
		document.getElementById("srealloc").disabled = true;
		document.getElementById("srealloc").value = "<?php echo $opinion ?>";
		document.getElementById("btn").disabled = true;</script>
	</script>		
	<?php
	if($opinion=='Leave Hostel')
	{
		echo"<form action='realloc_configure_leave.php' method='post'>";
        echo"<div class='form-row'>";
		echo"<div class='form-group col-md-4'>";
            echo"<label for='sid'>Student ID : </label>";
            echo"<input type='text' class='form-control' id='ssid' name='sid' placeholder='Enter Student's ID here'  required>
        </div>";
        echo"</div>";
        echo"<input type='submit' value='Proceed' name='submit' class='btn btn-primary'/>";
		echo"</form>";
	}
	else{
		echo"<form action='realloc_configure_change.php' method='post'>";
		echo"<label>Enter sid which want to change the room</label>";
		echo"<input type='text' name='sid'/><br/>";
		echo"<input type='submit' value='Go' name='submit'/>";
		echo"</form>";
	}
}
?>
		  </div>
      </div>
</div>
</body>
</html>