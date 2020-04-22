<?php
ob_start();
define('myheader',TRUE);
require('header.php');
session_start();
?>
<html>
<head>
<title>Expand Hostel</title>
<script type="text/javascript">

	 document.getElementById("logout").style.display = "block";
  	 document.getElementById("drop").style.display = "none";
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
            <a href="#" id="build" class="list-group-item list-group-item-action bg-light">Manage Building</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Manage Employee</a>
            <a href="student_profile.php" class="list-group-item list-group-item-action bg-light">Profile</a>
            <a href="#" class="list-group-item list-group-item-action bg-light">Setting</a>
          </div>
      </div>
      <div id="page-content-wrapper">
          <div class="container-fluid">
              <form action="expand.php" method="post">
					<div class="row">
          				<div class="form-group col-md-4">
            			<label for="hostel">Please select the hostel type : </label>
            			<select id="hostel" name="hostel" class="form-control" required>
              			<option selected>Boys Hostel</option>
              			<option>Girls Hostel</option>
            			</select>
            			</div>
          			</div>	
          			<input type="submit" value="Next" name="submit" id="btn" class="btn btn-primary"/>	
			  </form>
      
</body>
<script type="text/javascript">
	document.getElementById("build").style.pointerEvents="none";
	document.getElementById("build").style.cursor="default";
</script>
</html>
<?php
if(isset($_POST['submit'])){
	    
	    $choice=$_POST['hostel'];
		?>
		<script type="text/javascript">
			
			document.getElementById("hostel").disabled = true;
			document.getElementById("hostel").value = "<?php echo $choice ?>";
			document.getElementById("btn").disabled = true;
		</script>
		<?php
		if($choice=='Boys Hostel'){
				echo"<form action='expand_config.php' method='post'>";
				    echo"<div class='row'>";
          				echo"<div class='form-group col-md-4'>";
            			echo"<label for='build1'>Select Building Number : </label>";
            			echo"<select id='build1' name='build1' class='form-control' required>";
              			for($i=1;$i<=7;$i++){
					    echo"<option>b".$i."</option>";
				        }	
            			echo"</select>";
          				echo"</div>";
				echo"<br/>";
				echo"<div class='form-group col-md-4'>";
				echo"<label for='floor'>Floor Number</label>";
                echo"<input type='text' class='form-control' id='floor' name='floor' placeholder='Name of floor' required>";
				echo"</div>";
				echo"<div class='form-group col-md-4'>";
				echo"<label for='room'>Room Number</label>";
                echo"<input type='text' class='form-control' id='room' name='room' placeholder='Room Number' required>";
				echo"</div>";
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"</div>";
				echo"<input type='submit' value='Proceed' name='submitf' class='btn btn-primary'/>";
				echo"</form>";

		}else{
				echo"<form action='expand_config.php' method='post'>";
				echo"<label>Building Number</label>";
				echo"<select name='build1'>";
				for($i=1;$i<=7;$i++){
				echo"<option>g".$i."</option>";
				}
				echo"</select>";
				echo"<br/>";
				echo"<label>Floor Number</label>";
				echo"<input type='text' name='floor' autocomplete='off' required/><br/>";
				echo"<label>Room Number</label>";
				echo"<input type='text' name='room' autocomplete='off' required/><br/>";
				echo "<input type='hidden' name='hostel' value=".$choice.">";
				echo"<input type='submit' value='Go' name='submitf'/>";
				echo"</form>";
						
		}
}
?>
</div>
</div>